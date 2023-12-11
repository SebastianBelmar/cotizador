<?php

namespace App\Http\Livewire\Admin\Detalles;

use App\Models\DetallesTerminosGenerale as Detalle;

use Livewire\Component;

use Livewire\WithPagination;

class Detalles extends Component
{

    use WithPagination;

    public $search;

    public $crear = false, $editar = false;

    public $eliminado = false, $creado = false, $editado = false;

    public $nuevoDetalle;

    public function buscar() {
        $this->resetPage();
        $this->emit('render');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'nuevoDetalle' => 'required|max:65535',
        ];
    }

    public function messages()
    {
        return [
            'nuevoTermino.required' => 'No se puede guardar un detalle vacío',
        ];
    }

    public $indice;

    public function openCrear() {

        $this->nuevoDetalle = '';

        $this->crear = true;
    }

    public function editarDetalle($index) {

        $this->indice = $index;

        $this->nuevoDetalle = Detalle::where('id', $this->indice)->first()->description;

        $this->editar =true;
    }

    public function guardarDetalleEditado() {

        $this->validate();

        $detalle = Detalle::where('id', $this->indice)->first();

        $detalle->description = $this->nuevoDetalle;

        $detalle->save();

        $this->nuevoDetalle = '';

        $this->editar = false;

        $this->editado = true;
    }

    public function guardarDetalle() {

        $this->validate();

        Detalle::create([
            "description" => $this->nuevoDetalle,
            'status' => 1,
        ]);

        $this->nuevoDetalle = '';

        $this->crear = false;

        $this->creado = true;
    }

    public function borrarDetalle($index) {
        $detalle = Detalle::where('id', $index)->first();
        $detalle->delete();


        $this->eliminado = true;
    }

    public function render()
    {
        $detalles =Detalle::where('status', 1);
        $detalles = $detalles->where('description', 'LIKE' ,  '%' . trim($this->search) . '%')
        ->orWhere('id' , trim($this->search))
        ->latest('id')
        ->paginate(10);

        return view('livewire.admin.detalles.detalles', compact('detalles'));
    }
}
