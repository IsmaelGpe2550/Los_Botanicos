<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendedor_id',
        'pedido_id',
        'planta_id',
        'amount',
        'status',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class);
    }

    public function planta()
    {
        return $this->belongsTo(Planta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
