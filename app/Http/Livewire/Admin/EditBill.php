<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\User;
use Livewire\Component;

class EditBill extends Component
{

    public $cotizacion;

    public $open;

    //al definir las propiedades de validacion nos permite usar las propiedades de un objeto
    protected $rules = [
        'cotizacion.fecha' => 'required',
        'cotizacion.descuento' => 'required|min:2',
        'cotizacion.status' => 'required|in:1,2',
    ];

    public function mount(Cotizacione $cotizacion){
        $this->cotizacion = $cotizacion;
    }

    public function save() {

        $this->validate();

        $this->cotizacion->save();

        $this->emitTo('admin.show-bill', 'render');
        $this->emit('alert', 'agregaste una nueva cotizacion');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.edit-bill');
    }
}
