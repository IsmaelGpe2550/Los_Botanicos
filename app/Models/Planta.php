<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'description',
        'price',
        'stock',
        'user_id',
    ];

    public function detalles_carrito()
    {
        return $this->hasMany(Detalles_carrito::class);
    }
}
