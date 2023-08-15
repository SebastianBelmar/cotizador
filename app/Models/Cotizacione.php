<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemProducto;
use App\Models\DatosEmpresa;
use App\Models\Cliente;

class Cotizacione extends Model
{
    use HasFactory;

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function item_productos()
    {
        return $this->hasMany(ItemProducto::class);
    }

    public function datos_empresas()
    {
        return $this->hasMany(DatosEmpresa::class);
    }

    public function detalles_terminos()
    {
        // se puede usar de las dos formas '' o con objeto
        return $this->hasMany('App\Models\DetallesTermino');
    }
}
