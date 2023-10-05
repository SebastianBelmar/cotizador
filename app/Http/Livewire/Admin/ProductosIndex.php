<?php

namespace App\Http\Livewire\Admin;

use App\Models\Producto;

use Livewire\Component;

use Livewire\WithPagination;

class ProductosIndex extends Component
{

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productos = Producto::where('name', 'LIKE' ,  '%' . $this->search . '%')
                        ->latest('id')
                        ->paginate(10);

        return view('livewire.admin.productos-index', compact('productos'));
    }
}
