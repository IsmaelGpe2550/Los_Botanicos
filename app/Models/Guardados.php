<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardados extends Model
{
    use HasFactory;

    protected $fillable = [
        'planta_id',
        'user_id',
    ];
}
