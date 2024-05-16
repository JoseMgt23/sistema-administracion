<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Arrendatario extends Model
{
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

}
