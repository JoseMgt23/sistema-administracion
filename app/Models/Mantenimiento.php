<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'propiedad_id',
        'descripcion',
        'fecha',
        'costo'
    ];
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
}
