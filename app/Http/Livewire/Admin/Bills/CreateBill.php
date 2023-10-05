<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\DatosEmpresa;
use App\Models\DetallesTermino;
use App\Models\ItemProducto;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateBill extends Component
{

    public $step = 1;

    public function avanzar(){
        $this->step++;
    }

    public $cotizacion, $item, $detalle, $producto_code, $datosEmpresa_id;

    public $isCheckedTerminos = [], $isCheckedDetalles = [];

    public $DTDescription, $DTStatus;

    public $search, $open = false, $open_edit=false, $openDatos = false, $openDetalles = false, $openDetalles_edit = false, $openTerminos = false;

    public $date, $user_id, $fecha, $cliente_id = null , $descuento = 0 , $status = 1;

    public $code = 100, $name = '', $lenght, $width, $quantity, $price = 0;

    public $total = 0;

    protected $listeners = ['render', 'create', 'mount', 'sincronizarDatos'];

    public $conjuntoReglas;

    public function rules()
    {
        if ($this->conjuntoReglas === 'conjunto1') {
            return [
                'fecha' => "required",
                'descuento' => 'nullable|integer',
                'status' => 'required|in:1,2',
                'cliente_id' => 'required|not_in:null',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto2') {
            return [
                'code' => 'required|min:3',
                'name' => 'required|string|max:200',
                'lenght' => 'required|numeric',
                'width' => 'required|numeric',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto3') {
            return [
                'item.code' => 'required|min:3',
                'item.name' => 'required|string|max:200',
                'item.lenght' => 'required|numeric',
                'item.width' => 'required|numeric',
                'item.quantity' => 'required|numeric',
            ];
        } elseif ($this->conjuntoReglas === 'conjunto4') {
            return [
                'DTDescription' => 'required|string',
                'DTStatus' => 'required|in:1,2',
            ];
        }elseif ($this->conjuntoReglas === 'conjunto5') {
            return [
                'detalle.description' => 'required|string',
                'detalle.status' => 'required|in:1,2',
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

    public function sincronizarDatos() {
        $detalles = $this->cotizacion->detalles_termino;

        $i=0;
        foreach($detalles as $detalle){
            if($detalle->status == 2){
                $this->isCheckedTerminos[$i]= $detalle->id;
                $i++;
            }
        }
        $i=0;
        foreach($detalles as $detalle){
            if($detalle->status == 1){
                $this->isCheckedDetalles[$i]= $detalle->id;
                $i++;
            }
        }
    }

    public function inicializarValores(DetallesTermino $detalle)
    {
        $this->detalle = $detalle;
        $this->emit('render');
    }

    public function calcular () {
        
        $producto = Producto::where('code', $this->code)->value('price');

        if (is_numeric($this->width) && is_numeric($this->lenght) && is_numeric($this->quantity)) {
            $this->price = $this->width * $this->lenght * $this->quantity * $producto;
        }
    }

    public function datosEmpresa() {
        if(is_numeric($this->datosEmpresa_id)){
            $this->cotizacion->datos_empresa()->sync([$this->datosEmpresa_id]);
        }
        $this->openDatos = false;
    }

    public function detallesTerminos() {

        $this->conjuntoReglas = 'conjunto4';

        $this->validate();

        DetallesTermino::create([
            'description' => $this->DTDescription,
            'status' => $this->DTStatus
        ]);

        $detalleOTermino = DetallesTermino::latest('id')->first();

        $this->cotizacion->detalles_termino()->attach([$detalleOTermino->id]);

        $this->emit('sincronizarDatos');
        $this->emit('render');

        $this->openDetalles = false;
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

        $this->cotizacion->create([
            'fecha' => $this->fecha,
            'descuento' => is_numeric($this->descuento) ? $this->descuento : 0,
            'user_id' => $this->user_id,
            'cliente_id' => $this->cliente_id,
            'status' => $this->status
        ]);

        $this->emit('mount');

        $this->step++;

        //return redirect()->route('admin.bills.index')->with('info-success', 'Se agrego correctamente el nuevo registro');
    }

    public function render()
    {
        $bill = $this->cotizacion;
        $clientes = Cliente::all();

        //$items = ItemProducto::find($this->cotizacion->id);
        $productos = Producto::all();
        $datosEmpresas = DatosEmpresa::all()->toArray();

        $items = ItemProducto::where('cotizacione_id', $this->cotizacion->id)->get();

        $terminos = DetallesTermino::where('status', 2)->get();
        $detalles = DetallesTermino::where('status', 1)->get();

        return view('livewire.admin.bills.create-bill', compact('clientes', 'bill', 'items', 'productos', 'datosEmpresas', 'detalles', 'terminos'));
    }

    public function edit(ItemProducto $item) {

        $this->item = $item;

        $this->code = $item->code;

        $this->open_edit = true;

    }

    public function save() {

        $array =array_merge($this->isCheckedTerminos, $this->isCheckedDetalles);
        $this->cotizacion->detalles_termino()->sync($array);

        return redirect()->route('admin.bills.index')->with('info-success', 'Se creó correctamente la cotización');
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

    public function deleteDetalles (DetallesTermino $detalle) {
        $detalle->delete();
        $this->emit('render');
    }

}
