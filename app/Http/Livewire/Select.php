<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select extends Component
{

    public $search = '';
    public $clientes;
    public $cliente_id;

    public function mount($clientes, $cliente_id) {
        $this->clientes = $clientes->toArray();
        $this->cliente_id = $cliente_id;
    }


    public function render()
    {
        return view('livewire.select');
    }

}
