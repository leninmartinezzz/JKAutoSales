<?php

namespace App\Services;

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\Item;
use Illuminate\Support\Facades\Mail;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use Illuminate\Support\Facades\Log;

class QuickBooksService
{
    protected $dataService;
    protected $OAuth2LoginHelper;

    public function __construct()
    {
        try {
            Log::info("🔄 Inicializando QuickBooksService...");

            $config = config('quickbooks');
            
            // Verificar configuración mínima
            if (empty($config['client_id']) || empty($config['client_secret'])) {
                throw new \Exception("Configuración de QuickBooks incompleta");
            }

            // Configurar la URL base correctamente
            $baseUrl = ($config['environment'] === 'production') ? 'Production' : 'Development';
            
            Log::info("🌐 Usando entorno: {$baseUrl}");

            $this->dataService = DataService::Configure([
                'auth_mode' => 'oauth2',
                'ClientID' => $config['client_id'],
                'ClientSecret' => $config['client_secret'],
                'RedirectURI' => $config['redirect_uri'],
                'accessTokenKey' => $config['access_token'],
                'refreshTokenKey' => $config['refresh_token'],
                'QBORealmID' => $config['realm_id'],
                'baseUrl' => $baseUrl,
            ]);

            $this->OAuth2LoginHelper = $this->dataService->getOAuth2LoginHelper();
            
            Log::info("✅ QuickBooksService inicializado correctamente");

        } catch (\Exception $e) {
            Log::error("❌ Error inicializando QuickBooksService: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Autenticar y refrescar token explícitamente
     */
    public function authenticate()
    {
        try {
            Log::info("🔐 Iniciando autenticación con QuickBooks...");

            // Verificar que tenemos refresh token
            $refreshToken = config('quickbooks.refresh_token');
            if (empty($refreshToken)) {
                throw new \Exception("Refresh token no configurado");
            }

            Log::info("🔄 Refrescando token con: " . substr($refreshToken, 0, 10) . "...");
            
            $accessTokenObj = $this->OAuth2LoginHelper->refreshAccessTokenWithRefreshToken($refreshToken);
            
            $this->dataService->updateOAuth2Token($accessTokenObj);

            Log::info("✅ Token refrescado exitosamente");

            Log::info("📊 Obteniendo información de la compañía...");
            $companyInfo = $this->dataService->getCompanyInfo();
            
            if ($companyInfo) {
                Log::info("✅ Autenticación exitosa con QuickBooks");
                Log::info("   Compañía: " . $companyInfo->CompanyName);
                Log::info("   ID: " . $companyInfo->Id);
                return true;
            }

            throw new \Exception("No se pudo obtener información de la compañía");

        } catch (\Exception $e) {
            Log::error("❌ Error en autenticación con QuickBooks: " . $e->getMessage());
            throw new \Exception("Error de autenticación: " . $e->getMessage());
        }
    }

    /**
     * Buscar customer por email y nombre (más robusto)
     */
    public function findCustomerByEmail($email, $name = null)
    {
        try {
            // Primero buscar por email (más preciso)
            $query = "SELECT * FROM Customer WHERE PrimaryEmailAddr = '{$email}'";
            Log::info("🔎 Ejecutando query por email: " . $query);
            
            $customers = $this->dataService->Query($query);
            
            if (!empty($customers) && count($customers) > 0) {
                Log::info("📦 Customer encontrado por email: " . $customers[0]->Id);
                return $customers[0];
            }

            // Si no se encuentra por email y tenemos nombre, buscar por nombre
            if ($name) {
                $query = "SELECT * FROM Customer WHERE DisplayName = '{$name}' OR GivenName = '{$name}'";
                Log::info("🔎 Ejecutando query por nombre: " . $query);
                
                $customers = $this->dataService->Query($query);
                
                if (!empty($customers) && count($customers) > 0) {
                    Log::info("📦 Customer encontrado por nombre: " . $customers[0]->Id);
                    Log::info("   Email del customer encontrado: " . ($customers[0]->PrimaryEmailAddr->Address ?? 'N/A'));
                    return $customers[0];
                }
            }

            Log::info("❓ No se encontró customer con email: {$email} o nombre: {$name}");
            return null;

        } catch (\Exception $e) {
            Log::error("🔍 Error buscando customer: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Crear customer en QuickBooks (versión mejorada con manejo de duplicados)
     */
    public function createCustomer($name, $email)
    {
        try {
            Log::info("👤 Iniciando creación de customer: {$name} ({$email})");

            // PRIMERO: Verificar si el customer ya existe (búsqueda más robusta)
            Log::info("🔍 Buscando customer existente por email y nombre...");
            $existingCustomer = $this->findCustomerByEmail($email, $name);
            if ($existingCustomer) {
                Log::info("✅ Customer ya existe en QuickBooks: {$existingCustomer->Id}");
                
                // Actualizar el email si es diferente
                if (empty($existingCustomer->PrimaryEmailAddr) || $existingCustomer->PrimaryEmailAddr->Address !== $email) {
                    Log::info("📧 Actualizando email del customer existente...");
                    $existingCustomer->PrimaryEmailAddr = [
                        "Address" => $email
                    ];
                    $updatedCustomer = $this->dataService->Update($existingCustomer);
                    if ($updatedCustomer) {
                        Log::info("✅ Email del customer actualizado exitosamente");
                    }
                }
                
                return $existingCustomer;
            }

            // SEGUNDO: Solo si no existe, autenticar y crear
            Log::info("🆕 Customer no existe, procediendo a crear...");
            
            // Autenticar
            $this->authenticate();

            // Generar un DisplayName único si es necesario
            $displayName = $this->generateUniqueDisplayName($name);

            // Crear nuevo customer
            $customer = Customer::create([
                "GivenName" => $name,
                "DisplayName" => $displayName,
                "PrimaryEmailAddr" => [
                    "Address" => $email
                ]
            ]);

            $result = $this->dataService->Add($customer);

            if ($result) {
                Log::info("🎉 Customer creado exitosamente en QuickBooks: {$result->Id}");
                Log::info("   Nombre: {$result->DisplayName}");
                Log::info("   Email: " . ($result->PrimaryEmailAddr->Address ?? 'N/A'));
                return $result;
            } else {
                $error = $this->dataService->getLastError();
                $errorMessage = $error ? $error->getResponseBody() : "Error desconocido";
                Log::error("❌ Error creando customer: " . $errorMessage);
                
                // Manejar error de duplicado específicamente
                if (strpos($errorMessage, 'Duplicate Name Exists') !== false) {
                    Log::info("🔄 Intentando recuperar customer duplicado...");
                    return $this->handleDuplicateCustomer($name, $email);
                }
                
                throw new \Exception("Error de QuickBooks: " . $errorMessage);
            }

        } catch (\Exception $e) {
            Log::error("💥 Error en createCustomer: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Manejar customer duplicado - buscar y retornar el existente
     */
    private function handleDuplicateCustomer($name, $email)
    {
        try {
            Log::info("🔄 Buscando customer duplicado: {$name}");
            
            // Buscar con diferentes criterios
            $queries = [
                "SELECT * FROM Customer WHERE DisplayName LIKE '%{$name}%'",
                "SELECT * FROM Customer WHERE GivenName LIKE '%{$name}%'",
                "SELECT * FROM Customer WHERE FamilyName LIKE '%{$name}%'"
            ];
            
            foreach ($queries as $query) {
                Log::info("🔍 Ejecutando query: {$query}");
                $customers = $this->dataService->Query($query);
                
                if (!empty($customers) && count($customers) > 0) {
                    $customer = $customers[0];
                    Log::info("✅ Customer duplicado encontrado: {$customer->Id}");
                    
                    // Actualizar email si es necesario
                    if (empty($customer->PrimaryEmailAddr) || $customer->PrimaryEmailAddr->Address !== $email) {
                        $customer->PrimaryEmailAddr = ["Address" => $email];
                        $updatedCustomer = $this->dataService->Update($customer);
                        if ($updatedCustomer) {
                            Log::info("✅ Email del customer duplicado actualizado");
                        }
                    }
                    
                    return $customer;
                }
            }
            
            throw new \Exception("No se pudo encontrar el customer duplicado");
            
        } catch (\Exception $e) {
            Log::error("❌ Error manejando customer duplicado: " . $e->getMessage());
            throw new \Exception("Error con customer duplicado: " . $e->getMessage());
        }
    }

    /**
     * Generar un DisplayName único para evitar duplicados
     */
    private function generateUniqueDisplayName($baseName)
    {
        $displayName = $baseName;
        $counter = 1;
        
        // Verificar si el nombre ya existe
        while ($this->displayNameExists($displayName)) {
            $displayName = $baseName . ' ' . $counter;
            $counter++;
            
            if ($counter > 10) {
                // Si llegamos a 10 intentos, agregar timestamp
                $displayName = $baseName . ' ' . time();
                break;
            }
        }
        
        Log::info("🏷️ DisplayName generado: {$displayName}");
        return $displayName;
    }

    /**
     * Verificar si un DisplayName ya existe
     */
    private function displayNameExists($displayName)
    {
        try {
            $query = "SELECT * FROM Customer WHERE DisplayName = '{$displayName}'";
            $customers = $this->dataService->Query($query);
            return !empty($customers) && count($customers) > 0;
        } catch (\Exception $e) {
            Log::error("❌ Error verificando DisplayName: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Crear factura para vehículo en QuickBooks
     */
    public function createVehicleInvoice($customerId, $vehicleData, $customerEmail)
    {
        try {
            Log::info("🧾 Creando factura de vehículo para customer: {$customerId}");
            Log::info("🚗 Datos del vehículo:", [
                'marca' => $vehicleData['marca'],
                'modelo' => $vehicleData['modelo'], 
                'anio' => $vehicleData['anio'],
                'precio' => $vehicleData['precio']
            ]);

            // Autenticar primero
            $this->authenticate();

            // Obtener o crear el servicio "Vehículos"
            $vehicleItemId = $this->getOrCreateVehicleItem();

            // Preparar la línea de la factura
            $lineItems = [
                [
                    "DetailType" => "SalesItemLineDetail",
                    "Amount" => $vehicleData['precio'],
                    "Description" => "Vehículo: {$vehicleData['marca']} {$vehicleData['modelo']} - Año {$vehicleData['anio']}",
                    "SalesItemLineDetail" => [
                        "ItemRef" => [
                            "value" => $vehicleItemId
                        ],
                        "UnitPrice" => $vehicleData['precio'],
                        "Qty" => 1
                    ]
                ]
            ];

            Log::info("💰 Precio del vehículo: {$vehicleData['precio']}");

            // Crear la factura
            $invoice = Invoice::create([
                "Line" => $lineItems,
                "CustomerRef" => [
                    "value" => $customerId
                ],
                "BillEmail" => [
                    "Address" => $customerEmail
                ],
                "BillEmailBcc" => [
                    "Address" => config('mail.from.address') // Copia al administrador
                ],
                "CustomerMemo" => [
                    "value" => "Venta de vehículo: {$vehicleData['marca']} {$vehicleData['modelo']} - Año {$vehicleData['anio']}. Gracias por su compra."
                ],
                "EmailStatus" => "NeedToSend",
                "TotalAmt" => $vehicleData['precio'],
                "ApplyTaxAfterDiscount" => false,
                "PrintStatus" => "NeedToPrint"
            ]);

            $result = $this->dataService->Add($invoice);

            if ($result) {
                Log::info("🎉 Factura de vehículo creada exitosamente:");
                Log::info("   Factura ID: {$result->Id}");
                Log::info("   Número: {$result->DocNumber}");
                Log::info("   Total: {$result->TotalAmt}");
                
                return $result;
            } else {
                $error = $this->dataService->getLastError();
                $errorMessage = $error ? $error->getResponseBody() : "Error desconocido";
                Log::error("❌ Error creando factura de vehículo: " . $errorMessage);
                throw new \Exception("Error de QuickBooks: " . $errorMessage);
            }

        } catch (\Exception $e) {
            Log::error("💥 Error en createVehicleInvoice: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Obtener o crear el servicio "Vehículos" en QuickBooks
     */
    private function getOrCreateVehicleItem()
    {
        try {
            $itemName = "Vehículos";
            
            // Buscar si el item "Vehículos" ya existe
            $query = "SELECT * FROM Item WHERE Name = '{$itemName}'";
            $items = $this->dataService->Query($query);
            
            if (!empty($items) && count($items) > 0) {
                Log::info("✅ Item 'Vehículos' encontrado: {$items[0]->Id}");
                return $items[0]->Id;
            }

            // Crear nuevo item "Vehículos" si no existe
            Log::info("🆕 Creando nuevo item: 'Vehículos'");
            $item = Item::create([
                "Name" => $itemName,
                "Description" => "Venta de vehículos",
                "Type" => "Service", // Tipo servicio para venta de vehículos
                "IncomeAccountRef" => [
                    "value" => $this->getIncomeAccount()
                ]
            ]);

            $result = $this->dataService->Add($item);
            
            if ($result) {
                Log::info("✅ Item 'Vehículos' creado: {$result->Id}");
                return $result->Id;
            }

            throw new \Exception("No se pudo crear el item 'Vehículos'");

        } catch (\Exception $e) {
            Log::error("❌ Error en getOrCreateVehicleItem: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Obtener cuenta de ingresos
     */
    private function getIncomeAccount()
    {
        try {
            // Buscar cuenta de ingresos por ventas
            $query = "SELECT * FROM Account WHERE AccountType = 'Income' AND Active = true AND Name LIKE '%Ventas%'";
            $accounts = $this->dataService->Query($query);
            
            if (!empty($accounts) && count($accounts) > 0) {
                return $accounts[0]->Id;
            }
            
            // Si no encuentra cuenta de ventas, buscar cualquier cuenta de ingresos
            $query = "SELECT * FROM Account WHERE AccountType = 'Income' AND Active = true";
            $accounts = $this->dataService->Query($query);
            
            if (!empty($accounts) && count($accounts) > 0) {
                return $accounts[0]->Id;
            }
            
            // Fallback - usa un ID por defecto
            Log::warning("⚠️ Usando ID por defecto para cuenta de ingresos");
            return "1"; // Ajusta según tu QuickBooks

        } catch (\Exception $e) {
            Log::warning("⚠️ No se pudo obtener cuenta de ingresos: " . $e->getMessage());
            return "1"; // Fallback
        }
    }

    /**
     * Enviar factura por correo electrónico
     */
    public function sendInvoice($invoiceId, $customerEmail, $customerName, $vehicleInfo = null)
    {
        try {
            Log::info("📧 Enviando factura {$invoiceId} a: {$customerEmail}");

            $this->authenticate();

            // Obtener la factura
            $invoice = $this->dataService->FindById("Invoice", $invoiceId);
            
            if (!$invoice) {
                throw new \Exception("No se encontró la factura con ID: {$invoiceId}");
            }

            // Intentar enviar email a través de QuickBooks
            $result = $this->dataService->SendEmail($invoice);

            if ($result) {
                Log::info("✅ Factura enviada por QuickBooks: {$invoiceId}");
            } else {
                Log::warning("⚠️ QuickBooks no pudo enviar el email, usando envío alternativo");
            }

            // Siempre enviar email personalizado desde Laravel como respaldo
            $this->sendVehicleInvoiceEmail($invoice, $customerEmail, $customerName, $vehicleInfo);
            
            return true;

        } catch (\Exception $e) {
            Log::error("❌ Error enviando factura: " . $e->getMessage());
            
            // Fallback: enviar solo email personalizado desde Laravel
            try {
                Log::info("🔄 Intentando envío alternativo desde Laravel...");
                $invoice = $this->dataService->FindById("Invoice", $invoiceId);
                $this->sendVehicleInvoiceEmail($invoice, $customerEmail, $customerName, $vehicleInfo);
                return true;
            } catch (\Exception $fallbackError) {
                Log::error("💥 Error en envío alternativo: " . $fallbackError->getMessage());
                throw $e;
            }
        }
    }

    /**
     * Envío personalizado de factura de vehículo desde Laravel
     */
    private function sendVehicleInvoiceEmail($invoice, $customerEmail, $customerName, $vehicleInfo = null)
    {
        try {
            Mail::send('emails.vehicle-invoice', [
                'invoice' => $invoice,
                'customerName' => $customerName,
                'customerEmail' => $customerEmail,
                'vehicleInfo' => $vehicleInfo
            ], function ($message) use ($customerEmail, $customerName, $invoice) {
                $message->to($customerEmail, $customerName)
                        ->subject('Factura de Vehículo - ' . config('app.name'))
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });

            Log::info("✅ Email personalizado de vehículo enviado a: {$customerEmail}");

        } catch (\Exception $e) {
            Log::error("❌ Error enviando email personalizado: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Proceso completo: crear customer + factura de vehículo + enviar email (versión más robusta)
     */
    public function createCompleteVehicleOrder($customerName, $customerEmail, $vehicleData)
    {
        try {
            Log::info("🚀 INICIANDO PROCESO COMPLETO DE VENTA DE VEHÍCULO");

            // 1. Crear o obtener customer (con manejo mejorado de duplicados)
            Log::info("👤 Creando/obteniendo customer...");
            $customer = $this->createCustomer($customerName, $customerEmail);
            
            if (!$customer) {
                throw new \Exception('No se pudo crear o obtener el customer');
            }

            Log::info("✅ Customer procesado: {$customer->Id} - {$customer->DisplayName}");

            // 2. Crear factura de vehículo
            Log::info("🧾 Creando factura de vehículo...");
            $invoice = $this->createVehicleInvoice($customer->Id, $vehicleData, $customerEmail);

            // 3. Enviar factura por correo
            Log::info("📧 Enviando factura por correo...");
            $this->sendInvoice($invoice->Id, $customerEmail, $customerName, $vehicleData);

            Log::info("🎊 PROCESO DE VENTA DE VEHÍCULO COMPLETADO EXITOSAMENTE");

            return [
                'customer' => $customer,
                'invoice' => $invoice,
                'success' => true
            ];

        } catch (\Exception $e) {
            Log::error("💥 ERROR EN PROCESO DE VENTA DE VEHÍCULO: " . $e->getMessage());
            
            // Si el error es específico del customer pero tenemos suficiente info, continuar
            if (strpos($e->getMessage(), 'customer') !== false && isset($customer)) {
                Log::warning("⚠️ Error con customer, pero continuando con la factura...");
                try {
                    // Intentar crear la factura de todos modos
                    $invoice = $this->createVehicleInvoice($customer->Id, $vehicleData, $customerEmail);
                    $this->sendInvoice($invoice->Id, $customerEmail, $customerName, $vehicleData);
                    
                    return [
                        'customer' => $customer,
                        'invoice' => $invoice,
                        'success' => true,
                        'warning' => 'Customer tuvo problemas pero factura creada'
                    ];
                } catch (\Exception $invoiceError) {
                    Log::error("💥 Error creando factura después de problema con customer: " . $invoiceError->getMessage());
                }
            }
            
            throw $e;
        }
    }

    /**
     * Método simple para probar conexión
     */
    public function testSimpleConnection()
    {
        try {
            Log::info("🧪 Probando conexión simple...");
            
            $config = config('quickbooks');
            $baseUrl = ($config['environment'] === 'production') ? 'Production' : 'Development';
            
            $dataService = DataService::Configure([
                'auth_mode' => 'oauth2',
                'ClientID' => $config['client_id'],
                'ClientSecret' => $config['client_secret'],
                'accessTokenKey' => $config['access_token'],
                'refreshTokenKey' => $config['refresh_token'],
                'QBORealmID' => $config['realm_id'],
                'baseUrl' => $baseUrl,
            ]);

            $companyInfo = $dataService->getCompanyInfo();
            
            if ($companyInfo) {
                return [
                    'success' => true,
                    'company_name' => $companyInfo->CompanyName,
                    'company_id' => $companyInfo->Id
                ];
            }

            return ['success' => false, 'error' => 'No se pudo obtener company info'];

        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}