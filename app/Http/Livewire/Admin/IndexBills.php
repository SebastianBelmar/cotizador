<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\WithPagination;

class IndexBills extends Component
{
    use WithPagination;

    public $search = "";


    public function render()
    {
        $clientes = Cliente::where('name', 'like', '%' . trim($this->search) . '%')->get();

        $clienteIds = $clientes->pluck('id');

        if ($this->search == '') {
            $cotizaciones = Cotizacione::latest('id')->paginate(10);
        } else {
            $cotizaciones = Cotizacione::whereIn('cliente_id', $clienteIds)
                            ->latest('id')
                            ->paginate(10);
        }

        $datos = Cliente::get();

        $clientes = [];

        foreach ($datos as $dato) {
            $clientes[$dato->id] = $dato->name;
        }

        $datos = User::get();

        $usuarios = [];

        foreach ($datos as $dato) {
            $usuarios[$dato->id] = $dato->name;
        }


        return view('livewire.admin.index-bills', compact('cotizaciones', 'clientes', 'usuarios'));

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('admin.bills.create');
    }
}
