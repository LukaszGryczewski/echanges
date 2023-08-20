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
        $groupedProducts = $cart->products->groupBy('user_id');
        $shippingCostPerVendor = 6.99;
        $shippingCost = $groupedProducts->count() * $shippingCostPerVendor;
        $totalPrice = $this->cartService->getTotalPrice($cart) + $shippingCost;
        return view('order.confirm', ['groupedProducts' => $groupedProducts, 'totalPrice' => $totalPrice, 'shippingCostPerVendor' => $shippingCostPerVendor]);
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

        return redirect()->route('payment.show', ['orderId' => $order->id]);
    }
}
