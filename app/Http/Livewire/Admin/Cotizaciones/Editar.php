<?php

namespace App\Http\Livewire\Admin\Cotizaciones;

use Livewire\Component;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\DetallesTermino;
use App\Models\DetallesTerminosGenerale;
use App\Models\ItemProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


class Editar extends Component
{

    public $conjuntoReglas, $bill;

    public $icon1=false, $open1=false, $ver1=false;
    public $icon2=true, $open2=false, $ver2=false, $openEdit2 = false;
    public $icon3=true, $open3=false, $nuevo3=false, $ver3=false, $openEdit3 = false;
    public $icon4=true, $open4=false, $nuevo4=false, $ver4=false, $openEdit4 = false;

    public $cliente_id, $fecha;

    public $codigo, $productoCodigo, $productoNombre, $productoPrecio, $productoDescripcion, $productoLargo, $productoAncho, $productoCantidad, $productoTotal, $opcion, $total = 0, $descuento;


    public $isCheckedDetalles = [];


    public function mount(Cotizacione $bill) {

        $this->bill = $bill;

        $this->clientes = Cliente::all();
        $this->productos = Producto::all();

        $this->detallesGenerales = DetallesTerminosGenerale::where('status', 1)->get()->toArray();

        $ArrayDetalles = [];
        foreach ($this->detallesGenerales as $detalle) {
            $objeto =  $detalle; // Clona el objeto para no modificar el original
            $objeto['up'] = false;
            $ArrayDetalles[] = $objeto;
        }
        $this->detallesGenerales = $ArrayDetalles;

        // LLENAR FORMULARIOS DE EDICION

        $this->cliente_id = (isset($this->bill->cliente_id) && $this->bill->cliente_id) ? $this->bill->cliente_id : '';
        $this->fecha = $this->bill->fecha;
        $this->descuento = ($this->bill->descuento == 0 || $this->bill->descuento == '') ? false : $this->bill->descuento;
        $this->opcion = ($this->bill->descuento == 0 || $this->bill->descuento == '') ? 2 : 1;


        $this->datosClientes = (isset($this->bill->cliente_id) && $this->bill->cliente_id) ? Cliente::find($this->cliente_id)->toArray() : '';

        $items = ItemProducto::where('cotizacione_id', $this->bill->id)->get()->toArray();   
        
        foreach( $items as $indice =>  $item){

            $this->datosProductos[$indice]['codigo'] = $item['code'];
            $this->datosProductos[$indice]['nombre'] = $item['name'];
            $this->datosProductos[$indice]['descripcion'] = $item['description'];
            $this->datosProductos[$indice]['largo'] = $item['lenght'];
            $this->datosProductos[$indice]['ancho'] = $item['width'];
            $this->datosProductos[$indice]['precio'] = $item['price'];
            $this->datosProductos[$indice]['cantidad'] = $item['quantity'];
            $this->datosProductos[$indice]['total'] = $item['total'];
            $this->datosProductos[$indice]['opcion'] = ($item['lenght']) ? 1 : 2 ;


        }


        $this->detallesCotizacion = DetallesTermino::where('cotizacione_id', $this->bill->id)->where('status', 1)->get()->toArray();  

        $this->terminosCotizacion = DetallesTermino::where('cotizacione_id', $this->bill->id)->where('status', 2)->get()->toArray();  
        

        $this->conjuntoReglas = 'paso1';

        if($this->validate()){
            $this->icon1=true;
        }
    }

    public function rules()
    {
        if ($this->conjuntoReglas === 'paso1') {
            return [
                'fecha' => "required",
                'cliente_id' => 'required|integer|exists:clientes,id',
            ];
        } elseif($this->conjuntoReglas === 'paso2_1') {
            return [
                'productoCodigo' => 'required|integer|exists:productos,code',
                'productoPrecio' => "required",
                'productoDescripcion' => "required",
                'productoLargo' => "required|numeric",
                'productoAncho' => "required|numeric",
                'productoCantidad' => "required|integer",
            ];
        } elseif($this->conjuntoReglas === 'paso2_2') {
            return [
                'productoCodigo' => 'required|integer|exists:productos,code',
                'productoPrecio' => "required",
                'productoDescripcion' => "required",
                'productoCantidad' => "required|integer",
            ];
        } elseif($this->conjuntoReglas === 'paso3') {
            return [
                'nuevoDetalle' => 'required',
            ];
        } elseif($this->conjuntoReglas === 'paso4') {
            return [
                'nuevoTermino' => 'required',
            ];
        } elseif($this->conjuntoReglas === 'paso5') {
            return [
                'icon1' => [
                            function ($attribute, $value, $fail) {
                                if ($value !== true) {
                                    $fail('Este apartado es obligatorio*');
                                }
                            },
                ],
                'icon2' => [
                            function ($attribute, $value, $fail) {
                                if ($value !== true) {
                                    $fail('Este apartado es obligatorio*');
                                }
                            },
                ],
                'icon3' => [
                            function ($attribute, $value, $fail) {
                                if ($value !== true) {
                                    $fail('Este apartado es obligatorio*');
                                }
                            },
                ],
                'icon4' => [
                            function ($attribute, $value, $fail) {
                                if ($value !== true) {
                                    $fail('Este apartado es obligatorio*');
                                }
                            },
                ],
                'cliente_id' => 'required|integer|exists:clientes,id',
            ];
        }
    }

    public function messages()
    {
        return [

            'productoCodigo.required' => 'El código de producto es obligatorio.',
            'productoCodigo.integer' => 'El código de producto debe ser un número entero.',
            'productoCodigo.exists' => 'El código de producto no existe en nuestros registros.',
            'productoPrecio.required' => 'Seleccione un producto',
            'productoDescripcion.required' => 'La descripción del producto es obligatoria.',
            'productoLargo.required' => 'El largo del producto es obligatorio.',
            'productoLargo.numeric' => 'El largo del producto debe ser un número.',
            'productoAncho.required' => 'El ancho del producto es obligatorio.',
            'productoAncho.numeric' => 'El ancho del producto debe ser un número.',
            'productoCantidad.required' => 'La cantidad del producto es obligatoria.',
            'productoCantidad.integer' => 'La cantidad del producto debe ser un número entero.',
            
            'fecha.required' => 'La fecha es obligatoria.',
            
            'cliente_id.integer' => 'El ID debe ser un número entero.',
            'cliente_id.required' => 'El ID es obligatorio.',
            'cliente_id.exists' => 'El ID ingresado no existe',
            
            'nuevoDetalle.required' => 'No se puede guardar un detalle vacío',

            'nuevoTermino.required' => 'No se puede guardar un término vacío',

        ];
    }

    public $clientes, $openInput1 = false;
    public $productos, $openInput2 = false;
    public $detalles, $openInput3 = false;
    public $terminos, $openInput4 = false;

    public $detallesGenerales = [], $detallesCotizacion = [];
    public $terminosGenerales = [], $terminosCotizacion = [];



    public $descripcionDetalle;
    public $status;

    public function seleccionarDetalles() {
        // $descripcion = 'hola foca';
        // $status = 1;

        // DetallesTerminosGenerale::create([
        //     'description' => $descripcion,
        //     'status'=> $status
        // ]);

        // $array = DetallesTerminosGenerale::where('status', 1)->latest()->first()->toArray();
        // $array['up'] = true;

        // array_push($this->detallesGenerales, $array);


        $ArrayDetalles = [];
        foreach ($this->detallesGenerales as $detalle) {
            if($detalle['up'] == true) {
                $objeto =  $detalle; 
                $ArrayDetalles[] = $objeto;
            }
        }
        $this->detallesCotizacion = $ArrayDetalles;

    }

    public function guardarInputCliente($id) {
        $this->cliente_id = $id;
        $this->openInput1 = false;
    }

    public $datosClientes = [];

    public function guardarCliente() {

        $this->conjuntoReglas = 'paso1';

        $this->validate();

        $this->datosClientes = (isset($this->bill->cliente_id) && $this->bill->cliente_id) ? Cliente::find($this->cliente_id)->toArray() : '';

        $this->icon1=true; $this->open1=false;

    }

    public function guardarInputProducto($codigo) {
        $this->productoCodigo= $codigo;
        $this->codigo= $codigo;

        $productoSeleccionado = Producto::where('code', 'like', '%' . trim($this->codigo) . '%')->first();

        $this->productoNombre= $productoSeleccionado->name;
        $this->productoPrecio= $productoSeleccionado->price;
        $this->productoDescripcion= $productoSeleccionado->description;

        $this->openInput2 = false;
    }

    public function guardarInputDetalle($index) {

        $detalleSeleccionado = DetallesTerminosGenerale::where('id', 'like', '%' . trim($index) . '%')->first()->toArray();

        array_push($this->detallesCotizacion, $detalleSeleccionado);

        $this->icon3 = true;

        $this->openInput3 = false;
    }

    public function guardarInputTermino($index) {

        $terminoSeleccionado = DetallesTerminosGenerale::where('id', 'like', '%' . trim($index) . '%')->first()->toArray();

        array_push($this->terminosCotizacion, $terminoSeleccionado);

        $this->icon4 = true;

        $this->openInput4 = false;
    }


    public $datosProducto = [], $datosProductos = [];

    public function guardarProducto() {

        if($this->opcion == 1){
            $this->conjuntoReglas = 'paso2_1';
            $this->productoTotal = floatval($this->productoAncho) * floatval($this->productoLargo) * floatval($this->productoCantidad) *  floatval($this->productoPrecio);

            $this->datosProducto = [
                "codigo" => $this->productoCodigo,
                "nombre" => $this->productoNombre,
                "descripcion" => $this->productoDescripcion,
                "cantidad" => $this->productoCantidad,
                "ancho" => $this->productoAncho,
                "largo" => $this->productoLargo,
                "precio" => $this->productoPrecio,
                "total" => $this->productoTotal,
                "opcion" => $this->opcion,
            ];

            $this->validate();

        }else{
            $this->conjuntoReglas = 'paso2_2';
            $this->productoTotal =  floatval($this->productoCantidad) *  floatval($this->productoPrecio);

            $this->datosProducto = [
                "codigo" => $this->productoCodigo,
                "nombre" => $this->productoNombre,
                "descripcion" => $this->productoDescripcion,
                "cantidad" => $this->productoCantidad,
                "ancho" => '',
                "largo" => '',
                "precio" => $this->productoPrecio,
                "total" => $this->productoTotal,
                "opcion" => $this->opcion,
            ];

            $this->validate();

        }

        array_push($this->datosProductos, $this->datosProducto);

        $this->reinicioVariables();

        $this->icon2 = true;
        $this->open2 = false;
    }

    public $nuevoDetalle;

    public function guardarDetalle() {
        $this->conjuntoReglas = 'paso3';

        $this->validate();

        $detalle = [
            "id" => '',
            "description" => $this->nuevoDetalle,
            "status" => 1
        ];

        array_push($this->detallesCotizacion, $detalle);

        $this->nuevoDetalle = '';

        $this->icon3 = true;
        $this->nuevo3 = false;

    }

    public $nuevoTermino;

    public function guardarTermino() {
        $this->conjuntoReglas = 'paso4';

        $this->validate();

        $termino = [
            "id" => '',
            "description" => $this->nuevoTermino,
            "status" => 2
        ];

        array_push($this->terminosCotizacion, $termino);

        $this->nuevoTermino = '';

        $this->icon4 = true;
        $this->nuevo4 = false;

    }

    public $indiceProducto;

    public function editarProducto($index) {
        $this->indiceProducto = $index;

        $this->datosProducto = $this->datosProductos[$this->indiceProducto];

        [   "codigo" => $this->productoCodigo,
            "nombre" => $this->productoNombre,
            "descripcion" => $this->productoDescripcion,
            "cantidad" => $this->productoCantidad,
            "ancho" => $this->productoAncho,
            "largo" => $this->productoLargo,
            "precio" => $this->productoPrecio,
            "total" => $this->productoTotal,
            "opcion" => $this->opcion,
        ] = $this->datosProducto;

        $this->codigo = $this->productoCodigo;

        $this->openEdit2 =true;
    }

    public $indiceDetalle;

    public function editarDetalle($index) {

        $this->indiceDetalle = $index;

        $this->nuevoDetalle = $this->detallesCotizacion[$this->indiceDetalle]['description'];

        $this->openEdit3 =true;
    }

    public $indiceTermino;

    public function editarTermino($index) {

        $this->indiceTermino = $index;

        $this->nuevoTermino = $this->terminosCotizacion[$this->indiceTermino]['description'];

        $this->openEdit4 =true;
    }

    public function editarDetalleGuardar() {
    
        $this->conjuntoReglas = 'paso3';

        $this->validate();

        $this->detallesCotizacion[$this->indiceDetalle]['description'] =  $this->nuevoDetalle;

        $this->nuevoDetalle = '';

        $this->icon3 = true;

        $this->openEdit3 = false;
    }

    public function editarTerminoGuardar() {
    
        $this->conjuntoReglas = 'paso4';

        $this->validate();

        $this->terminosCotizacion[$this->indiceTermino]['description'] =  $this->nuevoTermino;

        $this->nuevoTermino = '';

        $this->icon4 = true;

        $this->openEdit4 = false;
    }

    public function editarProductoGuardar() {

        if($this->opcion == '1'){
            $this->conjuntoReglas = 'paso2_1';
            $this->productoTotal = floatval($this->productoAncho) * floatval($this->productoLargo) * floatval($this->productoCantidad) *  floatval($this->productoPrecio);

            $this->datosProducto = [
                "codigo" => $this->productoCodigo,
                "nombre" => $this->productoNombre,
                "descripcion" => $this->productoDescripcion,
                "cantidad" => $this->productoCantidad,
                "ancho" => $this->productoAncho,
                "largo" => $this->productoLargo,
                "precio" => $this->productoPrecio,
                "total" => $this->productoTotal,
                "opcion" => $this->opcion,
            ];

            $this->validate();

        }else{
            $this->conjuntoReglas = 'paso2_2';
            $this->productoTotal =  floatval($this->productoCantidad) *  floatval($this->productoPrecio);

            $this->datosProducto = [
                "codigo" => $this->productoCodigo,
                "nombre" => $this->productoNombre,
                "descripcion" => $this->productoDescripcion,
                "cantidad" => $this->productoCantidad,
                "ancho" => '',
                "largo" => '',
                "precio" => $this->productoPrecio,
                "total" => $this->productoTotal,
                "opcion" => $this->opcion,
            ];

            $this->validate();

        }

        $this->datosProductos[$this->indiceProducto] =  $this->datosProducto;

        $this->reinicioVariables();

        $this->indiceProducto = '';

        $this->openEdit2 =false;

    }

    public function borrarTermino($index) {
        unset($this->terminosCotizacion[$index]);
        if(empty($this->terminosCotizacion)){
            $this->icon4 = false;
        }
    }

    public function borrarDetalle($index) {
        unset($this->detallesCotizacion[$index]);
        if(empty($this->detallesCotizacion)){
            $this->icon3 = false;
        }
    }

    public function borrarProducto($index) {
        unset($this->datosProductos[$index]);
        if(empty($this->datosProductos)){
            $this->icon2 = false;
        }
    }

    public function reiniciarDescuento() {
        $this->descuento = '';
    }

    public function reinicioVariables() {

        $this->codigo= '';


         $this->productoCodigo = '';
         $this->productoNombre = '';
         $this->productoDescripcion = '';
         $this->productoCantidad = '';
         $this->productoAncho = '';
         $this->productoLargo = '';
         $this->productoPrecio = '';
         $this->productoTotal = '';


         $this->datosProducto = [
            "codigo" => $this->productoCodigo,
            "nombre" => $this->productoNombre,
            "descripcion" => $this->productoDescripcion,
            "cantidad" => $this->productoCantidad,
            "ancho" => $this->productoAncho,
            "largo" => $this->productoLargo,
            "precio" => $this->productoPrecio,
            "total" => $this->productoTotal,
            "opcion" => $this->opcion,
        ];

        $this->emit('render');
    }


    public $descripcion, $descripcionTermino;

    public $numeroProductos = 0;

    public function render()
    {
        $this->clientes = Cliente::where('name', 'like', '%' . trim($this->cliente_id) . '%')
        ->orWhere('id', 'like', '%' . trim($this->cliente_id) . '%')->get();

        $this->productos = Producto::where('name', 'like', '%' . trim($this->codigo) . '%')
        ->orWhere('code', 'like', '%' . trim($this->codigo) . '%')->get();

        $this->detallesGenerales = DetallesTerminosGenerale::where('description', 'like', '%' . trim($this->descripcion) . '%')->where('status', 1)->get();

        $this->terminosGenerales = DetallesTerminosGenerale::where('description', 'like', '%' . trim($this->descripcionTermino) . '%')->where('status', 2)->get();

        $this->numeroProductos = count($this->datosProductos);

        //dd($this->detallesCotizacion);

        return view('livewire.admin.cotizaciones.editar');
    }

    public function crearCotizacion() {

        $this->conjuntoReglas = 'paso5';

        $this->validate();

        $this->bill->fecha = $this->fecha; // Reemplaza con la fecha que desees
        $this->bill->descuento = ($this->descuento) ? $this->descuento : false; // Reemplaza con el descuento que desees
        $this->bill->user_id = Auth::user()->id; // Reemplaza con el ID del usuario correspondiente
        $this->bill->cliente_id = $this->cliente_id; // Reemplaza con el ID del cliente correspondiente
        $this->bill->status = 1; // Puedes cambiar el estado según sea necesario
        $this->bill->save();


        ItemProducto::where('cotizacione_id', $this->bill->id)->delete();

        foreach( $this->datosProductos as $datosProducto){

            ItemProducto::create([
                'code' => $datosProducto['codigo'],
                'name' => $datosProducto['nombre'],
                'description' => $datosProducto['descripcion'],
                'lenght' => ($datosProducto['largo']) ? $datosProducto['largo'] : null,
                'width' => ($datosProducto['ancho']) ? $datosProducto['ancho'] : null,
                'quantity' => $datosProducto['cantidad'],
                'price' => $datosProducto['precio'],
                'total' => $datosProducto['total'],
                'cotizacione_id' => $this->bill->id,
            ]);
        }

        DetallesTermino::where('cotizacione_id', $this->bill->id)->delete();

        foreach( $this->detallesCotizacion as $detalleCotizacion){
            DetallesTermino::create([
                'description' => $detalleCotizacion['description'],
                'status' => 1,
                'cotizacione_id' => $this->bill->id,
            ]);
        }

        foreach( $this->terminosCotizacion as $terminoCotizacion){
            DetallesTermino::create([
                'description' => $terminoCotizacion['description'],
                'status' => 2,
                'cotizacione_id' => $this->bill->id,
            ]);
        }


        return redirect()->route('admin.bills.index')->with('info-success', "Actualizó correctamente la cotización");
    }
}
