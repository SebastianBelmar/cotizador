<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class IndexClientes extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clientes = Cliente::where('name', 'LIKE', '%'.  trim($this->search) . '%')
        ->orWhere('email', 'LIKE', '%'.  trim($this->search) . '%')->paginate();

        return view('livewire.admin.index-clientes', compact('clientes'));
    }
}
