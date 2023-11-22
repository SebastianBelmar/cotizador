<?php

namespace App\Http\Livewire\Admin\Terminos;

use App\Models\DetallesTerminosGenerale as Termino;

use Livewire\Component;

use Livewire\WithPagination;

class Terminos extends Component
{
    use WithPagination;

    public $search;

    public $crear = false, $editar = false;

    public $eliminado = false, $creado = false, $editado = false;

    public $nuevoTermino;

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
            'nuevoTermino' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nuevoTermino.required' => 'No se puede guardar un término vacío',
        ];
    }

    public $indice;

    public function openCrear() {

        $this->nuevoTermino = '';

        $this->crear = true;
    }

    public function editarTermino($index) {

        $this->indice = $index;

        $this->nuevoTermino = Termino::where('id', $this->indice)->first()->description;

        $this->editar =true;
    }

    public function guardarTerminoEditado() {

        $this->validate();

        $termino = Termino::where('id', $this->indice)->first();

        $termino->description = $this->nuevoTermino;

        $termino->save();

        $this->editar = false;

        $this->editado = true;
    }

    public function guardarTermino() {

        $this->validate();

        Termino::create([
            "description" => $this->nuevoTermino,
            'status' => 2,
        ]);

        $this->nuevoTermino = '';

        $this->crear = false;

        $this->creado = true;
    }

    public function borrarTermino($index) {
        $termino = Termino::where('id', $index)->first();
        $termino->delete();


        $this->eliminado = true;
    }

    public function render()
    {
        $terminos =Termino::where('status', 2);
        $terminos = $terminos->where('description', 'LIKE' ,  '%' . trim($this->search) . '%')
        ->orWhere('id' , trim($this->search))
        ->latest('id')
        ->paginate(10);

        return view('livewire.admin.terminos.terminos', compact('terminos'));
    }
}
