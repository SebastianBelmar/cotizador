<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cotizacion;

class DatosEmpresa extends Model
{
    use HasFactory;

    public function cotizaciones() {
        return $this->hasMany(Cotizacion::class);
    }
}
