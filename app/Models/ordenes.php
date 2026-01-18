<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenes extends Model // Recomendado: PascalCase
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'cliente_id',
        'vehiculo_id',
        'fecha_orden',
        'estado',
        'notas'
    ];

    protected $attributes = [
        'estado' => 'pendiente',
        'notas' => ''
    ];

    protected $casts = [
        'fecha_orden' => 'date',
    ];

    /**
     * Relación con el cliente (usuario)
     */
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    /**
     * Relación con el vehículo - VERIFICAR NOMBRE DEL MODELO
     */
    public function vehiculo()
    {
        // Verifica cuál es el nombre correcto de tu modelo de vehículos
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id'); 
    }
}