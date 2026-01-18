<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use App\Services\QuickBooksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehiculos;

class OrdenesController extends Controller
{
    protected $quickBooksService;

    public function __construct(QuickBooksService $quickBooksService)
    {
        $this->quickBooksService = $quickBooksService;
    }

   public function confirmarOrden(Request $request, $ordenId)
{
    try {
        Log::info("🔄 ===== INICIANDO CONFIRMACIÓN DE ORDEN {$ordenId} =====");
        
        $orden = ordenes::with('cliente', 'vehiculo')->findOrFail($ordenId);
        
        // Verificar si la orden ya está completamente pagada
        if ($orden->estado === 'completado') {
            Log::warning("⚠️ Orden {$ordenId} ya está completamente pagada");
            return response()->json([
                'success' => false,
                'message' => 'La orden ya ha sido completamente pagada'
            ], 400);
        }

        // Obtener el vehículo fresco de la base de datos para evitar problemas de caché
        $vehiculo = Vehiculos::findOrFail($orden->vehiculo_id);

        Log::info("📋 Datos de la orden:");
        Log::info("   Orden ID: {$orden->id}");
        Log::info("   Cliente: {$orden->cliente->name}");
        Log::info("   Email: {$orden->cliente->email}");
        Log::info("   Vehículo: {$vehiculo->marca} {$vehiculo->modelo}");
        Log::info("   Año: {$vehiculo->anio}");
        Log::info("   Precio: {$vehiculo->precio}");
        Log::info("   Inicial: {$vehiculo->Inicial}");
        Log::info("   Cuotas_cont: {$vehiculo->Cuotas_cont}");
        Log::info("   Cuotas_max: {$vehiculo->Cuotas_max}");

        // CALCULAR MONTO A FACTURAR SEGÚN CUOTAS
        $montoAFacturar = $this->calcularMontoFactura($vehiculo);
        
        Log::info("💰 Monto a facturar: {$montoAFacturar}");

        // Preparar datos del vehículo para la factura
        $vehicleData = [
            'marca' => $vehiculo->marca,
            'modelo' => $vehiculo->modelo,
            'anio' => $vehiculo->anio,
            'precio' => $montoAFacturar,
            'tipo_cuota' => $this->obtenerTipoCuota($vehiculo)
        ];

        // PASO 1: Crear customer, factura de vehículo y enviar email
        Log::info("🧾 Creando factura de vehículo en QuickBooks...");
        $invoiceResult = $this->quickBooksService->createCompleteVehicleOrder(
            $orden->cliente->name,
            $orden->cliente->email,
            $vehicleData
        );
        
        if (!$invoiceResult) {
            throw new \Exception('No se pudo crear la factura del vehículo en QuickBooks');
        }

        Log::info("✅ Factura de vehículo creada y enviada:");
        Log::info("   Customer ID: {$invoiceResult['customer']->Id}");
        Log::info("   Invoice ID: {$invoiceResult['invoice']->Id}");
        Log::info("   Número de factura: {$invoiceResult['invoice']->DocNumber}");
        Log::info("   Total: {$invoiceResult['invoice']->TotalAmt}");

        // PASO 2: Actualizar contador de cuotas
        Log::info("📝 Actualizando contador de cuotas...");
        $nuevoContador = $vehiculo->Cuotas_cont + 1;
        
        $vehiculo->update([
            'Cuotas_cont' => $nuevoContador
        ]);
        
        Log::info("📊 Contador de cuotas actualizado: {$vehiculo->Cuotas_cont}/{$vehiculo->Cuotas_max}");

        // Verificar si el vehículo ya está completamente pagado
        $estaCompletamentePagado = $vehiculo->Cuotas_cont >= $vehiculo->Cuotas_max;

        // PASO 3: Actualizar la orden local
        Log::info("📝 Actualizando orden local...");
        $descripcionCuota = $this->obtenerDescripcionCuota($vehiculo);
        
        // Solo cambiar estado a "completado" si está completamente pagado
        $nuevoEstado = $estaCompletamentePagado ? 'completado' : 'pendiente';
        
        $orden->update([
            'estado' => $nuevoEstado,
            'notas' => $orden->notas . " | Factura {$descripcionCuota} QuickBooks #{$invoiceResult['invoice']->DocNumber} - " . now()->format('d/m/Y H:i')
        ]);

        $message = "✅ Factura {$descripcionCuota} creada y enviada por correo (Factura #{$invoiceResult['invoice']->DocNumber})";
        
        if (isset($invoiceResult['warning'])) {
            $message .= ' - Nota: ' . $invoiceResult['warning'];
        }

        // Verificar si el vehículo ya está completamente pagado
        if ($estaCompletamentePagado) {
            Log::info("💰 Vehículo completamente pagado, marcando como no disponible...");
            $vehiculo->update([
                'disponible' => false
            ]);
            $message .= " - 🎉 ¡Vehículo completamente pagado! Orden completada.";
        } else {
            $cuotasRestantes = $vehiculo->Cuotas_max - $vehiculo->Cuotas_cont;
            $message .= " - Próxima cuota: {$cuotasRestantes} restantes";
        }

        Log::info("🎉 ===== ORDEN #{$orden->id} FACTURADA EXITOSAMENTE =====");

        return response()->json([
            'success' => true,
            'message' => $message,
            'quickbooks_customer_id' => $invoiceResult['customer']->Id,
            'quickbooks_invoice_id' => $invoiceResult['invoice']->Id,
            'invoice_number' => $invoiceResult['invoice']->DocNumber,
            'customer_name' => $invoiceResult['customer']->DisplayName,
            'total_amount' => $invoiceResult['invoice']->TotalAmt,
            'tipo_cuota' => $this->obtenerTipoCuota($vehiculo),
            'cuota_actual' => $vehiculo->Cuotas_cont,
            'cuotas_totales' => $vehiculo->Cuotas_max,
            'esta_completamente_pagado' => $estaCompletamentePagado,
            'orden' => [
                'id' => $orden->id,
                'estado' => $nuevoEstado
            ]
        ]);

    } catch (\Exception $e) {
        Log::error("💥 ===== ERROR CONFIRMANDO ORDEN {$ordenId} =====");
        Log::error("   Mensaje: " . $e->getMessage());
        Log::error("   Archivo: " . $e->getFile());
        Log::error("   Línea: " . $e->getLine());
        
        $errorMessage = '❌ Error al procesar la factura: ' . $e->getMessage();
        
        // Mensaje más amigable para el usuario
        if (strpos($e->getMessage(), 'Duplicate Name Exists') !== false) {
            $errorMessage = '❌ Error: Ya existe un cliente con ese nombre en QuickBooks. El sistema está intentando recuperar la información.';
        }
        
        return response()->json([
            'success' => false,
            'message' => $errorMessage
        ], 500);
    }
}
    /**
     * Calcular monto a facturar según el sistema de cuotas
     */
    private function calcularMontoFactura($vehiculo)
    {
        if ($vehiculo->Cuotas_cont == 0) {
            // Primera cuota - pago inicial
            return $vehiculo->Inicial;
        } else {
            // Cuotas mensuales
            $montoRestante = $vehiculo->precio - $vehiculo->Inicial;
            $montoPorCuota = $montoRestante / $vehiculo->Cuotas_max;
            return $montoPorCuota;
        }
    }

/**
 * Actualizar contador de cuotas
 */
private function actualizarContadorCuotas($vehiculo)
{
    // Obtener el vehículo fresco de la base de datos
    $vehiculoActual = Vehiculos::find($vehiculo->id);
    
    if (!$vehiculoActual) {
        Log::error("❌ No se pudo encontrar el vehículo con ID: {$vehiculo->id}");
        return false;
    }
    
    $nuevoContador = $vehiculoActual->Cuotas_cont + 1;
    
    $vehiculoActual->update([
        'Cuotas_cont' => $nuevoContador
    ]);
    
    Log::info("📊 Contador de cuotas actualizado: {$vehiculoActual->Cuotas_cont}/{$vehiculoActual->Cuotas_max}");
    
    return true;
}

    /**
     * Obtener tipo de cuota para la descripción
     */
    private function obtenerTipoCuota($vehiculo)
    {
        if ($vehiculo->Cuotas_cont == 0) {
            return 'inicial';
        } else {
            return 'cuota_' . $vehiculo->Cuotas_cont;
        }
    }

    /**
     * Obtener descripción de la cuota para las notas
     */
    private function obtenerDescripcionCuota($vehiculo)
    {
        if ($vehiculo->Cuotas_cont == 0) {
            return 'Pago Inicial Vehículo';
        } else {
            return "Cuota {$vehiculo->Cuotas_cont} de {$vehiculo->Cuotas_max} Vehículo";
        }
    }

    /**
     * Rechazar orden
     */
    public function rechazarOrden(Request $request, $ordenId)
    {
        try {
            $orden = ordenes::findOrFail($ordenId);
            
            if ($orden->estado !== 'pendiente') {
                return response()->json([
                    'success' => false,
                    'message' => 'La orden ya ha sido procesada'
                ], 400);
            }

            $orden->update([
                'estado' => 'cancelado',
                'notas' => $orden->notas . " | Rechazada el " . now()->format('d/m/Y H:i')
            ]);

            Log::info("✅ Orden #{$orden->id} rechazada correctamente");

            $vehiculoUpdate = Vehiculos::findOrFail($orden->vehiculo_id);
            $vehiculoUpdate->disponible = true;
            $vehiculoUpdate->save();

            return response()->json([
                'success' => true,
                'message' => '✅ Orden rechazada correctamente'
            ]);

        } catch (\Exception $e) {
            Log::error('Error rechazando orden: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => '❌ Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar lista de órdenes
     */
    public function index()
    {
        $ordenes = ordenes::all();
        $ordenes->load('cliente', 'vehiculo');
        return view('ordenes', compact('ordenes'));
    }

    /**
     * Crear nueva orden de compra
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'vehiculo_id' => 'required|exists:vehiculos,id'
            ]);

            // Verificar que el usuario esté autenticado
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            // Verificar que el vehículo existe
            $vehiculo = Vehiculos::find($request->vehiculo_id);
            if (!$vehiculo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vehículo no encontrado'
                ], 404);
            }

            // Crear la orden
            $orden = ordenes::create([
                'cliente_id' => Auth::id(), // ← Aquí se asigna automáticamente el cliente
                'vehiculo_id' => $request->vehiculo_id,
                'fecha_orden' => now(),
                'estado' => 'pendiente',
                'notas' => 'Compra iniciada desde el sitio web'
            ]);

            $vehiculoUpdate = Vehiculos::findOrFail($orden->vehiculo_id);
            $vehiculoUpdate->disponible = false;
            $vehiculoUpdate->save();

            return response()->json([
                'success' => true,
                'message' => 'Purchase confirmed! Once the Administrator reviews the order, you\'ll receive an email with the invoice details.',
                'orden_id' => $orden->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar la compra: ' . $e->getMessage()
            ], 500);
        }
    }
}