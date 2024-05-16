<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }

    public function arrendatario()
    {
        return $this->belongsTo(Arrendatario::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
