<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
