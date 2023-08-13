<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{

    public function showInvoice($invoiceId)
{
    $invoice = Invoice::findOrFail($invoiceId);
    $order = $invoice->order;
    $cart = $order->cart;
    return view('invoice.show', compact('invoice', 'order', 'cart'));
}

public function downloadInvoice($invoiceId) {
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
