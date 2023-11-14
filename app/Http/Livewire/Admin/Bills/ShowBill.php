<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Mail\EmailBill;
use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\DatosEmpresa;
use App\Models\ItemProducto;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ShowBill extends Component
{
    protected $pdf;

    public $open = false;
    public $openInput1 = false;
    public $cliente_id = null;

    public $email = null;

    public $bill;
    public $clientes;

    protected $rules = [
            'email' => 'required|email|exists:clientes,email'
    ];

    public function messages()
    {
        return [
            'email.exists' => 'El email ingresado no lo tiene registrado ningún cliente',
        ];
    }
    
    public function mount(Cotizacione $bill) {
        $this->bill = $bill;
        $this->clientes = Cliente::all();
        if(isset($this->bill->cliente_id) && $this->bill->cliente_id){
            $this->email = Cliente::where('id', $this->bill->cliente_id)->first()->email;
        }else{
            $this->email = '';
        }

    }

    public function guardarCliente() {
    }

    public function guardarInputCliente($email) {
        $this->email = $email;
        $this->openInput1 = false;
    }

    public function enviarPdf()
    {
        $this->validate();

        $items = ItemProducto::where('cotizacione_id', $this->bill->id)->get();

        $datos = DatosEmpresa::get()->first();

        if(isset($this->bill->cliente_id) && $this->bill->cliente_id){
            $cliente = Cliente::where('id', $this->bill->cliente_id)->first();
        }else{
            $cliente = '';
        }



        $detalles = $this->bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        $this->pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $this->bill,
            'items' => $items,
            'total' => $total,
            'datos' => $datos,
            'cliente' => $cliente,
            'detalles' => $detalles,
            'ruta' => 0
        ]);

        $contenidoPDF = $this->pdf->output();

        $name = $this->bill->id . '.pdf';

        $path = storage_path('app/pdfs/' . $name);

        file_put_contents($path, $contenidoPDF);

        $data['nombreCliente'] = (isset($this->bill->cliente_id) && $this->bill->cliente_id) ? Cliente::where('id', $this->bill->cliente_id)->get()->value('name') : '';
        $data['nombreEmpresa'] = DatosEmpresa::where('id', 1)->get()->value('name');
        $data['nombreVendedor'] = Auth::user()->name;
        $data['telefonoEmpresa'] = DatosEmpresa::where('id', 1)->get()->value('phone');
        $data['fecha'] = $this->bill->fecha;
        $data['id'] = $this->bill->id;
        $data['total'] = $total*1.19*(1-$this->bill->descuento*0.01);
        $data['path'] = $path;

        $correo = new EmailBill($data);
    
        Mail::to($this->email)->send($correo);
    
        return redirect()->route('admin.bills.index')->with('info-success', "Correo electrónico enviado correctamente.");

    }

    public function render()
    {

        $this->clientes = Cliente::where('name', 'like', '%' . trim($this->email) . '%')
        ->orWhere('id', 'like', '%' . trim($this->email) . '%')
        ->orWhere('email', 'like', '%' . trim($this->email) . '%')->get();

        return view('livewire.admin.bills.show-bill');
    }
}
