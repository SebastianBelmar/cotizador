<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'description', 'price'];

    // Para usar el metodo el code en vez del id en las url
    public function getRouteKeyName() 
    {
        return "code";
    }
}
