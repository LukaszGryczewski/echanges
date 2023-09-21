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

    public function index(Request $request)
    {
        if ($request->has('order_status')) {
            $status = $request->order_status;

            if ($status === 'all') {
                $orders = Order::whereIn('order_status', ['paid', 'delivery', 'delivered'])
                    ->orderBy('order_date', 'asc')
                    ->paginate(20);
            } else {
                $orders = Order::where('order_status', $status)
                    ->orderBy('order_date', 'asc')
                    ->paginate(20);
            }
        } else {
            $orders = Order::orderBy('order_date', 'asc')
                ->paginate(20);
        }

        return view('order.index', ['orders' => $orders]);
    }

    public function show(string $id)
    {
        $order = Order::with([
            'cart' => function ($query) {
                $query->withTrashed();
            },
            'cart.products.user'
        ])->findOrFail($id);

        $cart = $order->cart;

        if (!$cart) {
            abort(404, 'Panier non trouvé.');
        }

        return view('order.show', compact('order', 'cart'));
    }

    public function setStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        if (in_array($status, ['delivery', 'delivered'])) {
            $order->order_status = $status;
            $order->save();

            // Retournez à la même page avec un message de confirmation
            return redirect()->back()->with('success', 'Statut de la commande mis à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Statut de commande non valide.');
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

        $total_weight = 0;
        foreach ($cart->products as $product) {
            $total_weight += $product->pivot->quantity * $product->weight;
        }
        $order = Order::create([
            'user_id' => auth()->id(),
            'cart_id' => auth()->user()->cart->id,
            'total_price' => $totalPrice,
            'order_date' => now(),
            'delivery_address' => $request->input('delivery_address'),
            'shipping_cost' => $shippingCost,
            'weight' => $total_weight,
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
                    break;
                }
            }
        }

        return $availableOptions;
    }
}
