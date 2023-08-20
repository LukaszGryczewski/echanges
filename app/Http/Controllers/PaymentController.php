<?php

namespace App\Http\Controllers;

use Log;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPaymentForm($orderId)
    {
        $order = Order::find($orderId);
        return view('payment.payment', compact('order'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $cart = $order->cart;
        $cartProducts = $cart->products;

        try {
            // Payment with Stripe
            Stripe::setApiKey(config('services.stripe.secret'));
            $token = $request->input('stripeToken');

            $charge = Charge::create([
                'amount' => $order->total_price * 100,
                'currency' => 'eur',
                'description' => 'Description du paiement',
                'source' => $token,
            ]);

            // If payement is succesfull update the variable order_status
            $order->update(['order_status' => 'paid']);

            foreach ($cartProducts as $cartProduct) {
                $product = Product::find($cartProduct->pivot->product_id);

                // Quantity buyed
                $product->quantity -= $cartProduct->pivot->quantity;

                // Verif if the quantity of product 0
                if ($product->quantity <= 0) {
                    $product->isAvailable = 0;
                    $product->quantity = 0;
                }

                $product->save();
            }

            // Create a invoice for the order
            $invoice = new Invoice([
                'order_id' => $order->id,
                'payment_id' => $charge->id, // ID du paiement Stripe
                'amount' => $order->total_price,
                'currency' => 'eur',
                'billing_date' => now(),
                'details' => 'Détails de la facture'
            ]);
            $invoice->save();

            // Generate PDF
            /** @var \Barryvdh\DomPDF\PDF $pdf */
            $pdfService = app('dompdf.wrapper');

            $pdf = $pdfService->loadView('invoice.show', [
                'invoice' => $invoice,
                'order' => $order,
                'cart' => $cart
            ]);

            $path = 'public/fonts/' . $invoice->id . '.pdf';
            Storage::put($path, $pdf->output());

            // Stock the way from PDF un the database
            $invoice->invoice_path = $path;
            $invoice->save();

            if ($order->order_status === 'paid') {
                $this->emptyUserCart($order->user_id);
            }

            //Send mail in format PDF
            /*$invoiceMail = new InvoiceMail($invoice, $pdf);
            Mail::to($order->user->email)->send($invoiceMail);*/

            return redirect()->route('payment.success');
        } catch (\Stripe\Exception\CardException $e) {
            return redirect()->route('payment.failed')
                ->withErrors('Erreur de paiement : ' . $e->getError()->message);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')
                ->withErrors('Erreur : ' . $e->getMessage());
        }
    }

    protected function emptyUserCart($userId)
    {
        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            $cart->delete();
        }
    }

    public function success()
    {
        $userId = auth()->id();
        $order = Order::where('user_id', $userId)
            ->where('order_status', 'paid')
            ->orderBy('order_date', 'desc')
            ->first();

        if (!$order) {
            return redirect()->route('product.index');
        }

        $invoice = Invoice::where('order_id', $order->id)->first();

        if (!$invoice) {
            return redirect()->route('home')->with('error', 'Aucune facture trouvée.');
        }
        return view('payment.success', compact('order', 'invoice'));
    }

    public function failed()
    {
        return view('payment.failed');
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
