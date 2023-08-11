<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function confirm() {
        $cart = $this->cartService->getCart();
        $totalPrice = $this->cartService->getTotalPrice($cart);
        return view('order.confirm', ['cart' => $cart, 'totalPrice' => $totalPrice]);
    }

    public function addressPayment()
    {
        return view('order.address-payment');
    }


    public function finalize(Request $request)
    {
        // 1. Création de la commande dans la base de données
        $cart = auth()->user()->cart;
        $totalPrice = $this->cartService->getTotalPrice($cart);

        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => auth()->user()->cart->id,
            'total_price' => $totalPrice,
            'order_date' => now(),
            'delivery_address' => $request->input('delivery_address'),
            'order_status' => 'pending',  // statut initial
        ]);

        // Redirigez vers la page de paiement avec l'ID de commande
        return redirect()->route('payment.show', ['orderId' => $order->id]);
    }

    /*public function finalize(Request $request)
{
    // 1. Création de la commande dans la base de données
    $cart = auth()->user()->cart;
    $totalPrice = $this->cartService->getTotalPrice($cart);

    $order = Order::create([
        'user_id' => auth()->id(),
        'cart_id' => auth()->user()->cart->id,
        'total_price' => $totalPrice,
        'order_date' => now(),
        'delivery_address' => $request->input('delivery_address'),
        'order_status' => 'pending',  // statut initial
    ]);

    try {
        // 2. Tentative de paiement via Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        $token = $request->input('stripeToken');

        $charge = Charge::create([
            'amount' => $totalPrice * 100,
            'currency' => 'eur',
            'description' => 'Description du paiement',
            'source' => $token,
        ]);

        // Si le paiement réussit, mettez à jour le statut
        $order->update(['order_status' => 'paid']);

        return redirect()->route('order.success');

    } catch (\Stripe\Exception\CardException $e) {
        // 3. Gestion des erreurs de paiement
        // La carte a été refusée
        return back()->withErrors('Erreur de paiement : ' . $e->getError()->message);
    } catch (\Exception $e) {
        // Autres erreurs (comme des problèmes réseau ou des erreurs internes du serveur)
        return back()->withErrors('Erreur : ' . $e->getMessage());
    }

}*/
/*public function success()
{
    return view('order.success');
}*/

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
