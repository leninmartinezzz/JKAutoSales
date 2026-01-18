<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'marca', 'modelo', 'descripcion', 'anio', 'color', 'precio', 
        'transmision', 'combustible', 'kilometraje', 'imagen', 
        'estado', 'tipo', 'descripcion_larga', 'Inicial', 'Cuotas', 'Cuotas_max', 'Cuotas_cont'
    ];

    protected $casts = [
        'anio' => 'integer',
        'precio' => 'decimal:2',
        'kilometraje' => 'decimal:2',
        'Inicial' => 'integer',
        'Cuotas' => 'integer',
        'Cuotas_max' => 'integer',
        'Cuotas_cont' => 'integer',

    ];

  /**
     * Accessor para compatibilidad con imagen_url
     */
    public function getImagenUrlAttribute()
    {
        return $this->imagen; // Ya es la URL completa de UploadCare
    }
}