<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'email', 'phone', 'address', 'city'];

    public function cotizacion() {
        return $this->hasMany(Cotizacion::class);
    }
}
