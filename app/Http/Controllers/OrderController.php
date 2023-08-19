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

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function confirm()
    {
        $cart = $this->cartService->getCart();
        $totalPrice = $this->cartService->getTotalPrice($cart);
        $shippingCost = 6.99;
        $totalPrice = $totalPrice + $shippingCost;
        return view('order.confirm', ['cart' => $cart, 'totalPrice' => $totalPrice]);
    }

    public function addressPayment()
    {
        return view('order.address-payment');
    }


    public function finalize(Request $request)
    {
        // Message error
        $messages = [
            'delivery_address.regex' => __('delivery_address_format'),
        ];

        // Add a validation for the belgish address
        $validatedData = $request->validate([
            'delivery_address' => [
                'required',
                'regex:/^[A-Za-z\s]+ \d+ [1-9][0-9]{3} [A-Za-z\s]+$/' // Ceci est une regex simple pour les codes postaux belges
            ],
            'payment_method' => 'required',
        ], $messages);

        // Create the order
        $cart = auth()->user()->cart;
        $totalPrice = $this->cartService->getTotalPrice($cart);
        $shippingCost = 6.99;  // Tarif fixe

        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => auth()->user()->cart->id,
            'total_price' => $totalPrice + $shippingCost,
            'order_date' => now(),
            'delivery_address' => $request->input('delivery_address'),
            'shipping_cost' => $shippingCost,
            'order_status' => 'pending',  // statut initial
        ]);

        // Redirigez vers la page de paiement avec l'ID de commande
        return redirect()->route('payment.show', ['orderId' => $order->id]);
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
