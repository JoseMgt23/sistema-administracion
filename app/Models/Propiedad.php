<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $fillable = ['direccion', 'descripcion', 'tipo', 'disponibilidad'];

    // Definición de la relación uno a uno con Contrato para obtener el contrato actual
    public function contratoActual()
    {
        return $this->hasOne(Contrato::class)->where('estado', 'activo');
    }

    // Definición de la relación uno a muchos con Contratos
    public function contratos(){
        return $this->hasMany(Contrato::class);
    }
}
