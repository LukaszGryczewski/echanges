<?php

namespace App\Http\Controllers;

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
        $cart = auth()->user()->cart;
    $totalPrice = $this->cartService->getTotalPrice($cart);
        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => auth()->user()->cart->id,
            'total_price' => $totalPrice,
            'order_date' => now(),
            'delivery_address' => $request->input('delivery_address'),
            'order_status' => 'pending',
        ]);

        // Redirect to a success page
        return redirect()->route('order.success');
    }

    public function success()
{
    return view('order.success');
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
