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

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function item_producto() {
        return $this->hasMany(ItemProducto::class);
    }

    public function datos_empresa()
    {
        return $this->belongsToMany(DatosEmpresa::class);
    }

    public function detalles_termino()
    {
        // se puede usar de las dos formas '' o con objeto
        return $this->belongsToMany('App\Models\DetallesTermino');
    }
}
