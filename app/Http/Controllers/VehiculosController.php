<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VehiculosController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculos::all();
        return view('agregar_vehiculo', compact('vehiculos'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'anio' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'color' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'transmision' => 'required|string|max:50',
            'combustible' => 'required|string|max:50',
            'kilometraje' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'estado' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'descripcion_larga' => 'nullable|string',
            'Inicial' => 'required|integer|min:0',
            'Cuotas_max' => 'required|integer|min:1|max:84',
        ]);

        try {
            $imagenUrl = null;
            
            // ✅ SUBIR A UPLOAD CARE
            if ($request->hasFile('imagen')) {
                Log::info('🚀 Iniciando subida a UploadCare...');
                $imagenUrl = $this->uploadToUploadCare($request->file('imagen'));
                
                if (!$imagenUrl) {
                    return redirect()->back()
                        ->with('error', 'No se pudo subir la imagen. Por favor, intenta con otra imagen.')
                        ->withInput();
                }
                
                Log::info('🎉 Imagen subida correctamente: ' . $imagenUrl);
            }

            // Crear el vehículo
            $vehiculo = Vehiculos::create([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'descripcion' => $request->descripcion,
                'anio' => $request->anio,
                'color' => $request->color,
                'precio' => $request->precio,
                'transmision' => $request->transmision,
                'combustible' => $request->combustible,
                'kilometraje' => $request->kilometraje,
                'imagen' => $imagenUrl,
                'estado' => $request->estado,
                'tipo' => $request->tipo,
                'descripcion_larga' => $request->descripcion_larga,
                'Inicial' => $request->Inicial,
                'Cuotas_max' => $request->Cuotas_max
            ]);

            Log::info('🚗 Vehículo creado exitosamente - ID: ' . $vehiculo->id);

            return redirect()->route('vehiculos.index')
                ->with('success', 'Vehículo registrado exitosamente!');

        } catch (\Exception $e) {
            Log::error('❌ Error al registrar vehículo: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al registrar el vehículo: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Vehiculos $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit($id)
    {
        try {
            $vehiculo = Vehiculos::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'vehiculo' => $vehiculo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Vehículo no encontrado'
            ], 404);
        }
    }

public function update(Request $request, $id)
{
    try {
        $vehiculo = Vehiculos::findOrFail($id);
        
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'anio' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'color' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'transmision' => 'required|string|max:50',
            'combustible' => 'required|string|max:50',
            'kilometraje' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'estado' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'Inicial' => 'required|integer|min:0', // ✅ Con I mayúscula
            'Cuotas_max' => 'required|integer|min:1|max:84', // ✅ Con C mayúscula
            'descripcion_larga' => 'nullable|string'
        ]);

        // ✅ CORREGIR: Usar 'Inicial' con I mayúscula para coincidir con el name del HTML
        $precio = $request->precio;
        $inicial = $request->Inicial; // ✅ Cambiado de 'inicial' a 'Inicial'
        $porcentajeMaximo = 0.6; // 60%
        
        if ($inicial > ($precio * $porcentajeMaximo)) {
            return response()->json([
                'success' => false,
                'message' => 'El pago inicial no puede exceder el 60% del precio del vehículo.'
            ], 422);
        }

        $data = $request->except('imagen');

        // ✅ SUBIR NUEVA IMAGEN A UPLOAD CARE SI SE PROPORCIONA
        if ($request->hasFile('imagen')) {
            Log::info('🚀 Iniciando actualización de imagen en UploadCare...');
            $imagenUrl = $this->uploadToUploadCare($request->file('imagen'));
            
            if (!$imagenUrl) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo subir la nueva imagen. Por favor, intenta con otra imagen.'
                ], 422);
            }
            
            $data['imagen'] = $imagenUrl;
            Log::info('🎉 Nueva imagen subida correctamente: ' . $imagenUrl);
        }

        // ✅ Agregar logs para debug
        Log::info('📝 Datos a guardar - Inicial: ' . $request->Inicial . ', Cuotas_max: ' . $request->Cuotas_max);
        Log::info('📋 Todos los datos:', $data);

        $vehiculo->update($data);

        Log::info('🚗 Vehículo actualizado exitosamente - ID: ' . $vehiculo->id);
        Log::info('✅ Valores guardados - Inicial: ' . $vehiculo->Inicial . ', Cuotas_max: ' . $vehiculo->Cuotas_max);

        return response()->json([
            'success' => true,
            'message' => 'Vehículo actualizado exitosamente!',
            'vehiculo' => $vehiculo
        ]);

    } catch (\Exception $e) {
        Log::error('❌ Error al actualizar vehículo: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al actualizar el vehículo: ' . $e->getMessage()
        ], 500);
    }
}
    public function destroy(Vehiculos $vehiculo)
    {
        try {
            $vehiculo->delete();

            return redirect()->route('vehiculos.index')
                ->with('success', 'Vehículo eliminado exitosamente!');

        } catch (\Exception $e) {
            Log::error('Error al eliminar vehículo: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al eliminar el vehículo: ' . $e->getMessage());
        }
    }

    /**
     * ✅ UPLOAD CARE - VERSIÓN FINAL CORREGIDA
     * Usa el dominio real de tu cuenta UploadCare
     */
    private function uploadToUploadCare($imageFile)
    {
        try {
            if (!$imageFile || !$imageFile->isValid()) {
                Log::error('❌ Archivo de imagen no válido');
                return null;
            }

            // ✅ OBTENER CREDENCIALES DESDE .env
            $publicKey = env('UPLOADCARE_PUBLIC_KEY', 'ida7c2afcafa14415d14');
            $secretKey = env('UPLOADCARE_SECRET_KEY');
            $uploadCareDomain = env('UPLOADCARE_DOMAIN', 'ju489kkfpk.ucarecd.net');

            if (!$secretKey) {
                Log::error('❌ Secret Key no configurada en .env');
                return null;
            }

            $fileName = 'vehiculo_' . time() . '_' . uniqid() . '.jpg';
            $timestamp = time();
            
            // ✅ GENERAR SIGNATURE
            $dataToSign = $secretKey . $timestamp;
            $signature = hash_hmac('sha256', $dataToSign, $secretKey);

            Log::info("📤 Subiendo a UploadCare...");
            Log::info("   - Archivo: {$fileName}");
            Log::info("   - Dominio: {$uploadCareDomain}");

            // ✅ SUBIR ARCHIVO
            $response = Http::timeout(30)
                ->asMultipart()
                ->post('https://upload.uploadcare.com/base/', [
                    [
                        'name' => 'UPLOADCARE_PUB_KEY',
                        'contents' => $publicKey
                    ],
                    [
                        'name' => 'signature', 
                        'contents' => $signature
                    ],
                    [
                        'name' => 'expire',
                        'contents' => $timestamp + 300
                    ],
                    [
                        'name' => 'file',
                        'contents' => fopen($imageFile->getRealPath(), 'r'),
                        'filename' => $fileName
                    ]
                ]);

            $statusCode = $response->status();
            Log::info("📡 Respuesta UploadCare - Status: {$statusCode}");

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['file'])) {
                    $fileId = $data['file'];
                    
                    // ✅ USAR EL DOMINIO REAL DE TU CUENTA
                    $imageUrl = "https://{$uploadCareDomain}/{$fileId}/{$fileName}";
                    
                    Log::info("✅ URL GENERADA: {$imageUrl}");
                    
                    // ✅ VERIFICAR QUE LA IMAGEN SE PUEDE LEER
                    if ($this->testImageUrl($imageUrl)) {
                        Log::info("🎉 VERIFICACIÓN: La imagen se carga correctamente");
                    } else {
                        Log::warning("⚠️ VERIFICACIÓN: La imagen no se pudo verificar, pero se guardará");
                    }
                    
                    return $imageUrl;
                } else {
                    Log::error('❌ Respuesta sin file ID: ' . json_encode($data));
                    return null;
                }
            } else {
                Log::error("❌ Error en subida - Status: {$statusCode}, Body: " . $response->body());
                return null;
            }
            
        } catch (\Exception $e) {
            Log::error('❌ Excepción en UploadCare: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * ✅ VERIFICAR SI UNA URL DE IMAGEN ES ACCESIBLE
     */
    private function testImageUrl($url)
    {
        try {
            $response = Http::timeout(5)->get($url);
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getDetails($id)
    {
        try {
            $vehiculo = Vehiculos::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'vehiculo' => [
                    'id' => $vehiculo->id,
                    'marca' => $vehiculo->marca,
                    'modelo' => $vehiculo->modelo,
                    'anio' => $vehiculo->anio,
                    'precio' => $vehiculo->precio,
                    'descripcion' => $vehiculo->descripcion,
                    'kilometraje' => $vehiculo->kilometraje,
                    'combustible' => $vehiculo->combustible,
                    'transmision' => $vehiculo->transmision,
                    'color' => $vehiculo->color,
                    'estado' => $vehiculo->estado,
                    'imagen' => $vehiculo->imagen,
                    'disponible' => $vehiculo->disponible
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Vehículo no encontrado'
            ], 404);
        }
    }
}