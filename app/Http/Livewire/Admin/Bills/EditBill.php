<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\ItemProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditBill extends Component
{
    public $user_id, $bill;

    public $fecha, $cliente_id, $descuento = 0, $status = 1;

    public $open = false;

    protected $listeners = ['render'];

    public $conjuntoReglas;

    public function rules()
    {
        if ($this->conjuntoReglas === 'conjunto1') {
            return [
                'fecha' => "required",
                'descuento' => 'required|numeric',
                'status' => 'required|in:1,2',
                'cliente_id' => 'required|not_in:null',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto2') {
            return [
                'code' => 'required|numeric|min:3',
                'name' => 'required|string|max:50',
                'lenght' => 'required|numeric',
                'width' => 'required|numeric',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
            ];
        }
    }

    public $code, $name = '', $lenght, $width, $quantity, $price = 0;

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
            'cotizacione_id' => $this->bill->id,
        ]);

        $this->open = false;
    }

    public function mount(Cotizacione $bill) {
        $this->user_id = Auth::user()->id;
        $this->bill = $bill;
    }

    public function inicializarValores()
    {
        $this->cliente_id = $this->bill->cliente_id;
        $this->fecha = $this->bill->fecha;
        $this->descuento = $this->bill->descuento;
        $this->status = $this->bill->status;
    }

    public function update()
    {
        $this->conjuntoReglas = 'conjunto1';

        $this->validate();

        $this->bill->update([
            'fecha' => $this->fecha,
            'descuento' => $this->descuento,
            'user_id' => $this->user_id,
            'cliente_id' => $this->cliente_id,
            'status' => $this->status
        ]);

        return redirect()->route('admin.bills.index')->with('info-success', 'Se actualizo correctamente el registro');
    }

    public function delete (ItemProducto $item) {
        $item->delete();
    }
    
    public function render()
    {
        $bill = $this->bill;
        $clientes = Cliente::all();
        $items = ItemProducto::where('cotizacione_id', $this->bill->id)->get();
        $productos = Producto::all();

        return view('livewire.admin.bills.edit-bill', compact('bill', 'clientes', 'items', 'productos'));
    }
}
