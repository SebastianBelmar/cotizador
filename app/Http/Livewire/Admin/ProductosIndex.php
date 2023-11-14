<?php

namespace App\Http\Livewire\Admin;

use App\Models\Producto;

use Livewire\Component;

use Livewire\WithPagination;

class ProductosIndex extends Component
{

    use WithPagination;

    public $search;


    public function buscar() {
        $this->resetPage();
        $this->emit('render');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productos = Producto::where('name', 'LIKE' ,  '%' . trim($this->search) . '%')
                        ->orWhere('code', 'LIKE', '%'.  trim($this->search) . '%')
                        ->latest('id')
                        ->paginate(10);

        return view('livewire.admin.productos-index', compact('productos'));
    }
}
