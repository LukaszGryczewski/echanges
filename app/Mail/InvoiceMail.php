<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;


    public $invoice;
    public $pdf;

    public function __construct(Invoice $invoice, $pdf)
    {
        $this->invoice = $invoice;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->view('emails.invoice')
            ->with([
                'order' => $this->invoice->order,
                'cart' => $this->invoice->order->cart
            ])
            ->attachData($this->pdf->output(), 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
