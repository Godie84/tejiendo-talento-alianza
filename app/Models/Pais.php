<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    // Si el nombre de la tabla es diferente a la convención de Laravel, especifica la tabla
    protected $table = 'paises';

    protected $fillable = ['nombre'];
}
