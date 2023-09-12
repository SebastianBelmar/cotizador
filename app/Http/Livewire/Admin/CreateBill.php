<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class CreateBill extends Component
{
    public $open = false;

    public $date;

    public function mount()
    {
        $this->date = Carbon::now()->addDays(10)->toDateString();;
    }

    public $fecha, $descuento , $status = 1;

    public function rules()
    {
        return [
            'fecha' => "required|before:$this->date",
            'descuento' => 'required|min:2',
            'status' => 'required|in:1,2',
        ];
    }


    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {

        $this->validate();

        Cotizacione::create([
            'fecha' => $this->fecha,
            'descuento' => $this->descuento,
            'user_id' => User::all()->random()->id,
            'cliente_id' => Cliente::all()->random()->id,
            'status'=> $this->status
        ]);

        $this->reset(['open', 'fecha', 'descuento', 'status']);

        $this->emitTo('admin.show-bill', 'render');
        $this->emit('alert', 'agregaste una nueva cotizacion');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.create-bill');
    }

}
