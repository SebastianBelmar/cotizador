<?php

namespace App\Http\Livewire\Admin\Bills;

use App\Mail\EmailBill;
use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\ItemProducto;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ShowBill extends Component
{
    protected $pdf;

    public $open = false;

    public $email;

    public $bill;

    protected $rules = [
            'email' => 'required|email'
    ];

    public function mount(Cotizacione $bill) {
        $this->bill = $bill;
    }

    public function enviarPdf()
    {
        $this->validate();

        $items = ItemProducto::where('cotizacione_id', $this->bill->id)->get();

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        $this->pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $this->bill,
            'items' => $items,
            'total' => $total
        ]);

        $contenidoPDF = $this->pdf->output();

        $name = $this->bill->id . '.pdf';

        $path = storage_path('app/pdfs/' . $name);

        file_put_contents($path, $contenidoPDF);

        $data['name'] = Cliente::where('id', $this->bill->cliente_id)->get()->value('name');
        $data['path'] = $path;

        $correo = new EmailBill($data);
    
        Mail::to($this->email)->send($correo);
    
        return redirect()->route('admin.bills.index')->with('info-success', "Correo electrónico enviado correctamente.");

    }

    public function render()
    {

        return view('livewire.admin.bills.show-bill');
    }
}
