<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Cotizacione;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\WithPagination;

class IndexBills extends Component
{
    use WithPagination;

    public $search;

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


        return view('livewire.admin.index-bills', compact('cotizaciones'));
    }

    public function create()
    {
        Cotizacione::create([
            'fecha' => Carbon::now(),
            'descuento' => 0,
            'user_id' => Auth::user()->id,
            'cliente_id' => null,
            'status'=> 2
        ]);

        return redirect()->route('admin.bills.create');
    }
}
