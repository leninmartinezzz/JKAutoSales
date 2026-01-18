<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\IndexController;

// Ruta principal - página de inicio
Route::get('/', [IndexController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

// Rutas para vehículos
Route::resource('vehiculos', VehiculosController::class);

// Rutas adicionales para vehículos (AJAX)
Route::get('/vehiculos/{id}/details', [VehiculosController::class, 'getDetails'])->name('vehiculos.details');
Route::get('/vehiculos/{id}/edit', [VehiculosController::class, 'edit'])->name('vehiculos.edit.ajax');

// ⚠️ ELIMINA ESTA LÍNEA - YA ESTÁ INCLUIDA EN Route::resource ⚠️
// Route::put('/vehiculos/{id}', [VehiculosController::class, 'update'])->name('vehiculos.update');

// Rutas para órdenes
Route::resource('ordenes', OrdenesController::class);
Route::post('/ordenes', [OrdenesController::class, 'store'])->name('ordenes.store');
Route::get('/mis-ordenes', [OrdenesController::class, 'misOrdenes'])->name('ordenes.mis-ordenes');
Route::post('/ordenes/{orden}/confirmar', [OrdenesController::class, 'confirmarOrden'])->name('ordenes.confirmar');
Route::post('/ordenes/{orden}/rechazar', [OrdenesController::class, 'rechazarOrden'])->name('ordenes.rechazar');

// Rutas para políticas y términos
Route::get('/politicas', [Dashboard::class, 'politicas'])->name('politicas');
Route::get('/terminos', [Dashboard::class, 'terminos'])->name('terminos');

// Ruta temporal para corregir URLs existentes - ELIMINAR después de usar
Route::get('/fix-existing-urls', [VehiculosController::class, 'fixExistingUrls']);

// Rutas de perfil (protegidas por auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/edit', function () {
        return view('edit-profile');
    })->name('profile.editting');
});

require __DIR__.'/auth.php';