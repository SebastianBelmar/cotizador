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
            from: new Address('ulfzark@gmail.com', 'el ulfsark'),
            replyTo: [
                new Address('ulfzark@gmail.com', 'el ulfsark'),
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
                'orderName' => $this->data['name'],
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
