<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{

    public function showPaymentForm($orderId)
    {
        $order = Order::find($orderId);
        // Passez la commande à la vue
        return view('payment.payment', compact('order'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        try {
            // Tentative de paiement via Stripe
            Stripe::setApiKey(config('services.stripe.secret'));
            $token = $request->input('stripeToken');

            $charge = Charge::create([
                'amount' => $order->total_price * 100,
                'currency' => 'eur',
                'description' => 'Description du paiement',
                'source' => $token,
            ]);

            // Si le paiement réussit, mettez à jour le statut
            $order->update(['order_status' => 'paid']);

            return redirect()->route('payment.success');  // Redirection vers la vue de succès
        } catch (\Stripe\Exception\CardException $e) {
            return redirect()->route('payment.failed')  // Redirection vers la vue d'échec
                  ->withErrors('Erreur de paiement : ' . $e->getError()->message);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')  // Redirection vers la vue d'échec
                  ->withErrors('Erreur : ' . $e->getMessage());
        }
        /*    return redirect()->route('order.success');
        } catch (\Stripe\Exception\CardException $e) {
            return back()->withErrors('Erreur de paiement : ' . $e->getError()->message);
        } catch (\Exception $e) {
            return back()->withErrors('Erreur : ' . $e->getMessage());
        }*/
    }

    public function success()
{
    return view('payment.success');
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
