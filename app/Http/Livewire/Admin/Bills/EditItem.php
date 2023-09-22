<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Models\ItemProducto;
use App\Models\Producto;
use Livewire\Component;

class EditItem extends Component
{
    public $item;

    public $open;

    public $precio = 0;

    protected $rules = [
        'item.code' => 'required|min:3',
        'item.name' => 'required|string|max:50',
        'item.lenght' => 'required|numeric',
        'item.width' => 'required|numeric',
        'item.quantity' => 'required|numeric',
        'item.price' => 'required',
    ];

    public function mount(ItemProducto $item) {
        $this->item = $item;
        $this->precio = Producto::where('code', $item->code)->value('price') ;
    }

    public function inicializarValores()
    {
        $this->validate();
        
        $this->precio = ($this->item->width) * ($this->item->lenght) * ($this->item->quantity) * Producto::where('code', $this->item->code)->value('price');
        $this->item->price = $this->precio;
    }

    public function calcular () {
        $producto = Producto::where('code', $this->item->code)->value('price');

        if (is_numeric($this->item->width) && is_numeric($this->item->lenght) && is_numeric($this->item->quantity)) {
            $this->precio = $this->item->width * $this->item->lenght * $this->item->quantity * $producto;
            $this->item->price = $this->precio;
            //$this->emitTo('admin.bills.create-bill', 'render');
            $this->emit('render');
        }

    }

    public function save() {
        $this->validate();
        $this->item->save();
        //$this->emitTo('admin.bills.create-bill', 'render');
        $this->emit('render');
        $this->open = false;
    }

    public function render()
    {
        $productos = Producto::all();

        return view('livewire.admin.bills.edit-item', compact('productos'));
    }
}
