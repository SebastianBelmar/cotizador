<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Mail\EmailBill;
use App\Models\AccessPdf;
use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\DatosEmpresa;
use App\Models\ItemProducto;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\URL;

class Whatsapp extends Component
{

    protected $pdf;

    public $open = false;
    public $openInput1 = false;
    public $cliente_id = null;

    public $phone = null;

    public $bill;
    public $clientes;

    public function rules(){
        return [
            'phone' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match("/^(\+?56|0)(\d{9})$/", $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono móvil chileno válido.');
                    }
                },
                'exists:clientes,phone',
            ],
        ];
    }
    public function messages()
    {
        return [
            'phone.exists' => 'El teléfono ingresado no lo tiene registrado ningún cliente',
        ];
    }

    public function mount(Cotizacione $bill) {
        $this->bill = $bill;
        $this->clientes = Cliente::all();
        if(isset($this->bill->cliente_id) && $this->bill->cliente_id){
            $this->phone = Cliente::where('id', $this->bill->cliente_id)->first()->phone;
        }else{
            $this->phone = '';
        }

    }

    public function guardarCliente() {
    }

    public function guardarInputCliente($phone) {
        $this->phone = $phone;
        $this->openInput1 = false;
    }

    public function enviarPdf()
    {
        $this->validate();

        $recurso = AccessPdf::findOrFail(1);
        $recurso->expired_at = now()->addMinutes(1); // Ejemplo: Caduca en 30 minutos
        $recurso->save();

        $url = URL::route('admin.bills.temporal.pdf', ['bill' => $this->bill]);

        try {
            $response = Http::
                withOptions([
                    'verify' => false,
                ])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . env('FB_ACCESS_TOKEN'),
                ])
                ->post(env('FB_MESSAGES_ENDPOINT'), [
                    'messaging_product' => 'whatsapp',
                    'to' => '56959964329',
                    'type' => 'template',
                    'template' => [
                        'name' => 'cotizador_prueba',
                        'language' => [
                            'code' => 'es'
                        ],
                        'components' => [
                            [
                                'type' => 'header',
                                'parameters' => [
                                    [
                                        'type' => 'document',
                                        'document' => [
                                            'link' => $url,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);

                if(!$response->successful()) {
                    throw new Exception("Error en la solicitud");
                }
                //dd($response->successful());

        } catch (\Exception $e) {

            return redirect()->route('admin.bills.show', $this->bill->id)->with('info-danger', "Se ha producido un error al enviar el mensaje de WhatsApp");
        }

        return redirect()->route('admin.bills.show', $this->bill->id)->with('info-success', "El mensaje de WhatsApp se ha enviado correctamente.");

    }

    public function render()
    {

        $this->clientes = Cliente::where('name', 'like', '%' . trim($this->phone) . '%')
        ->orWhere('id', 'like', '%' . trim($this->phone) . '%')
        ->orWhere('phone', 'like', '%' . trim($this->phone) . '%')
        ->orWhere('email', 'like', '%' . trim($this->phone) . '%')->get();


        // $url = URL::temporarySignedRoute('admin.bills.pdf',now()->addMinutes(1), ['bill' => $this->bill]);
        // $url = URL::temporarySignedRoute('cotizaciones.index',now()->addMinutes(1));

        $name = $this->bill->id . '.pdf';

        // $url = Storage::temporaryUrl(
        //     'app/pdfs/' . $name, now()->addMinutes(1)
        // );

        return view('livewire.admin.bills.whatsapp');
    }

}
