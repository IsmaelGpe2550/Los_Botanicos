<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrito_id',
        'planta_id',
        'amount',
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function planta()
    {
        return $this->belongsTo(Planta::class, 'planta_id');
    }
}
