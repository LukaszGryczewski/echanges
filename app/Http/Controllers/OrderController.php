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

    public function confirm(Request $request)
    {
        $cart = $this->cartService->getCart();
        $groupedProducts = $cart->products->groupBy('user_id');
        $totalWeight = $this->cartService->getTotalWeight($cart);
        $totalPrice = $this->cartService->getTotalPrice($cart);

        $deliveryOptions = config('delivery.options');
        $freeDeliveryThreshold = config('delivery.free_delivery_threshold');

        if ($totalPrice >= $freeDeliveryThreshold) {
            $availableOptions = ['free' => 0];
        } else {
            $availableOptions = $this->getAvailableDeliveryOptions($totalWeight, $deliveryOptions);
        }

        $preparedProducts = $this->prepareProductData($groupedProducts);

        return view('order.confirm', [
            'groupedProducts' => $groupedProducts,
            'totalPrice' => $totalPrice,
            'availableOptions' => $availableOptions,
            'preparedProducts' => $preparedProducts
        ]);
    }

    protected function prepareProductData($groupedProducts)
    {

        $preparedData = [];
        foreach ($groupedProducts as $vendorId => $products) {
            $vendorName = \App\Models\User::find($vendorId)->login;
            $rowCount = $products->count();
            foreach ($products as $index => $product) {
                $data = [
                    'vendorName' => $vendorName,
                    'productName' => $product->name,
                    'unitPrice' => $product->pivot->unit_price,
                    'quantity' => $product->pivot->quantity,
                    'totalOrderPrice' => $product->pivot->unit_price * $product->pivot->quantity,
                    'isFirst' => $index === 0,
                    'rowCount' => $rowCount,
                ];
                $preparedData[] = $data;
            }
        }
        return $preparedData;
    }

    public function finalize(Request $request)
    {
        //dd($request->all());
        $shippingCost = $request->input('chosen_delivery_cost');

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


        $totalPrice += $shippingCost;
        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => auth()->user()->cart->id,
            'total_price' => $totalPrice,
            'order_date' => now(),
            'delivery_address' => $request->input('delivery_address'),
            'shipping_cost' => $shippingCost,
            'order_status' => 'pending',
        ]);

        return redirect()->route('payment.show', ['orderId' => $order->id]);
    }

    protected function getAvailableDeliveryOptions($totalWeight, $deliveryOptions)
    {
        $availableOptions = [];

        foreach ($deliveryOptions as $option => $weightCostPairs) {
            foreach ($weightCostPairs as $pair) {
                list($maxWeight, $cost) = $pair;
                if ($totalWeight <= $maxWeight) {
                    $availableOptions[$option] = $cost;
                    break;  // Left when we match
                }
            }
        }

        return $availableOptions;
    }
}
