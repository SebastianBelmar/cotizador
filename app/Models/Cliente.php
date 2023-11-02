<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rut', 'email', 'phone', 'address', 'city', 'horario', 'giro', 'web'];

    public function cotizacion() {
        return $this->hasMany(Cotizacion::class);
    }
}
