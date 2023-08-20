<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cotizacione;

class DetallesTermino extends Model
{
    use HasFactory;

    public function cotizacione() {
        return $this->belongsToMany(Cotizacione::class);
    }
}
