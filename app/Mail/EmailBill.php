<?php

namespace App\Mail;

use App\Models\Order;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class EmailBill extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ulfzark@gmail.com', 'Cotizador'),
            replyTo: [
                new Address('ulfzark@gmail.com', 'Cotizador'),
            ],
            subject: 'Cotizacion',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'admin.bills.email',
            with: [
                'nombreCliente' => $this->data['nombreCliente'],
                'nombreEmpresa' => $this->data['nombreEmpresa'],
                'nombreVendedor' => $this->data['nombreVendedor'],
                'telefonoEmpresa' => $this->data['telefonoEmpresa'],
                'fecha' => $this->data['fecha'],
                'id' => $this->data['id'],
                'total' =>$this->data['total'],
                'path' => $this->data['path'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        $path = $this->data['path'];

        return  Attachment::fromPath($path)
                ->as('Cotizacion');

    }
}
