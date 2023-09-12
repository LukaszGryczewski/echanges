<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })->pagination(20);

        return view('invoice.index', compact('invoices'));
    }

    public function showInvoice($invoiceId)
    {
        $invoice = Invoice::with([
            'order.cart' => function ($query) {
                $query->withTrashed();
            },
            'order.cart.products.user'
        ])->findOrFail($invoiceId);

        $order = $invoice->order;
        $cart = $order->cart;

        if (!$cart) {
            abort(404, 'Panier non trouvé.');
        }

        return view('invoice.show', compact('invoice', 'order', 'cart'));
    }

    public function downloadInvoice($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);

        // Just auth user can see the facture
        if ($invoice->order->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $path = $invoice->invoice_path;

        if (Storage::exists($path)) {
            return Storage::download($path);
        } else {
            abort(404, "File not found.");
        }
    }
}
