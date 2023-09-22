<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\ItemProducto;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateBill extends Component
{

    public $cotizacion, $item, $producto_code;

    public $search, $open = false, $open_edit=false;

    public $date, $user_id, $fecha, $cliente_id = null , $descuento , $status = 1;

    public $code = 100, $name = '', $lenght, $width, $quantity, $price = 0;

    public $total = 0;

    protected $listeners = ['render', 'create'];

    public $conjuntoReglas;

    public function rules()
    {
        if ($this->conjuntoReglas === 'conjunto1') {
            return [
                'fecha' => "required|before:$this->date",
                'descuento' => 'required|min:2',
                'status' => 'required|in:1,2',
                'cliente_id' => 'required|not_in:null',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto2') {
            return [
                'code' => 'required|min:3',
                'name' => 'required|string|max:50',
                'lenght' => 'required|numeric',
                'width' => 'required|numeric',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto3') {
            return [
                'item.code' => 'required|min:3',
                'item.name' => 'required|string|max:50',
                'item.lenght' => 'required|numeric',
                'item.width' => 'required|numeric',
                'item.quantity' => 'required|numeric',
            ];
        }
    }

    public $formData = [
        'nombre' => '',
        'email' => '',
        // Otros campos del formulario
    ];


    public function mount()
    {

        $this->user_id = Auth::user()->id;
        $this->date = Carbon::now()->addDays(10)->toDateString();
        $this->cotizacion = Cotizacione::latest('id')->first();
        //$this->producto_code = Producto::where('code', $this->code)->first();
    }

    public function inicializarValores()
    {
    }

    public function calcular () {
        
        $producto = Producto::where('code', $this->code)->value('price');

        if (is_numeric($this->width) && is_numeric($this->lenght) && is_numeric($this->quantity)) {
            $this->price = $this->width * $this->lenght * $this->quantity * $producto;
        }
    }

    public function createItem()
    {
        $this->conjuntoReglas = 'conjunto2';

        $this->validate();

        ItemProducto::create([
            'code' => $this->code,
            'name' => $this->name,
            'lenght' => $this->lenght,
            'width' => $this->width,            
            'quantity' => $this->quantity,            
            'price' => $this->price,
            'cotizacione_id' => $this->cotizacion->id,
        ]);

        //$this->emitTo('admin.bills.create-bill', 'render');

        $this->open = false;
    }

    public function create() {
        $this->conjuntoReglas = 'conjunto1';

        $this->validate();

        $this->cotizacion->update([
            'fecha' => $this->fecha,
            'descuento' => $this->descuento,
            'user_id' => $this->user_id,
            'cliente_id' => $this->cliente_id,
            'status' => $this->status
        ]);

        return redirect()->route('admin.bills.index')->with('info-success', 'Se agrego correctamente el nuevo registro');
    }

    public function render()
    {
        $bill = $this->cotizacion;
        $clientes = Cliente::all();

        //$items = ItemProducto::find($this->cotizacion->id);
        $productos = Producto::all();
        $items = ItemProducto::where('cotizacione_id', $this->cotizacion->id)->get();

        return view('livewire.admin.bills.create-bill', compact('clientes', 'bill', 'items', 'productos'));
    }

    public function edit(ItemProducto $item) {

        $this->item = $item;

        $this->code = $item->code;

        $this->open_edit = true;

    }

    public function update() {

        $this->conjuntoReglas = 'conjunto3';

        $this->validate();

        $this->item->save();

        $this->open_edit = false;
    }

    public function delete (ItemProducto $item) {
        $item->delete();
    }

}
