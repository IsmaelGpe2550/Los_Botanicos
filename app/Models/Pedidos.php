<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'comprador_id',
        'status',
        'payment_method',
        'payment_status',
        'total_cost',
        'name',
        'direccion',
        'neighborhood',
        'city',
        'state',
        'postal_code',
        'phone',
    ];

    public function detalles()
    {
        return $this->hasMany(Detalles_pedido::class);
    }
}
