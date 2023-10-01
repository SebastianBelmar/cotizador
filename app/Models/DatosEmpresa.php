<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cotizacione;

class DatosEmpresa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cotizacione() {
        return $this->belongsToMany(Cotizacione::class);
    }
}
