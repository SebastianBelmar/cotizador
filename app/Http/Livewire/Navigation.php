<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Navigation extends Component
{

    public function render()
    {

        $productos = Producto::all();

        return view('livewire.navigation', compact('productos'));
    }
}
