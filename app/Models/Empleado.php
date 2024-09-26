<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'ciudad_nacimiento', 'es_jefe', 'jefe_id'];

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class);
    }

    public function jefe()
    {
        return $this->belongsTo(Empleado::class, 'jefe_id');
    }

    public function colaboradores()
    {
        return $this->hasMany(Empleado::class, 'jefe_id');
    }
}
