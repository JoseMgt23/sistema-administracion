<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
}
