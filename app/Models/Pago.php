<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
    'contrato_id',
    'fecha_pago',
    'monto',
    'estado'
    ];
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
