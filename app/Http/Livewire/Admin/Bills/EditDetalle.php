<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Models\DetallesTermino;
use Livewire\Component;

class EditDetalle extends Component
{
    public $detalle;

    public $open;

    protected $rules = [
        'detalle.description' => 'required|string',
        'detalle.status' => 'required|in:1,2',
    ];

    public function mount(DetallesTermino $detalle) {
        $this->detalle = $detalle;
    }

    public function save() {
        $this->validate();
        $this->detalle->save();
        $this->emit('render');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.bills.edit-detalle');
    }
}
