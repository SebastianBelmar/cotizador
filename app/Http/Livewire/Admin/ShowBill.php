<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Cotizacione;
use Livewire\Component;
// para paginar en forma dinamica
use Livewire\WithPagination;

class ShowBill extends Component
{
    //para la paginacion
    use WithPagination;

    public $cotizacion;
    public $open_edit = false;
    public $fecha_edit;
    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';

    //cargar componentes al final 
    public $readyToLoad = false;

    // escucha el evento de CreateBill, [metodo de createBill => metodo de ShowBill]
    // protected $listeners = ['render' => 'render']; son lo mismo si tienen el mismo nombre
    protected $listeners = ['render', 'delete'];

        //al definir las propiedades de validacion nos permite usar las propiedades de un objeto
    protected $rules = [
        'cotizacion.fecha' => 'required',
        'cotizacion.descuento' => 'required|min:2',
        'cotizacion.status' => 'required|in:1,2',
    ];

    // se ejecuta el metodo cuando cambia la propiedad serach, updating+nombre de propiedad con mayuscula al inicio
    public function updatingSearch(){
        //resetea la paginacion
        $this->resetPage();
    }

    public function render()
    {

        if($this->readyToLoad) {
            $clientes = Cliente::where('name', 'like', '%' . trim($this->search) . '%')->get();

            $clienteIds = $clientes->pluck('id');
    
            if ($this->search == '') {
                $cotizaciones = Cotizacione::orderBy($this->sort, $this->direction)
                                ->paginate(10);
            } else {
                $cotizaciones = Cotizacione::whereIn('cliente_id', $clienteIds)
                                ->orderBy($this->sort, $this->direction)
                                ->paginate(10);
            }
        }else{
            $cotizaciones = [];
        }

        

        return view('livewire.admin.show-bill', compact('cotizaciones'));
    }

    public function loadCotizaciones() {
        sleep(1);
        $this->readyToLoad = true;
    }

    public function order($sort) {
        if ($this->sort == $sort) {

            if($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    // Sin anidamiento
    public function edit(Cotizacione $cotizacion) {
        $this->cotizacion = $cotizacion;
        $this->open_edit = true;
        $this->fecha_edit = $cotizacion->fecha;
    }

    public function update() {
        $this->validate();

        $this->cotizacion->save();

        $this->emit('alert', 'agregaste una nueva cotizacion');
        $this->open_edit = false;
    }

    public function delete (Cotizacione $cotizacion) {
        $cotizacion->delete();
    }
}
