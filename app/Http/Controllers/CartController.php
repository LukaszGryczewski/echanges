<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function addProduct(Request $request, $productId)
    {
        $user = Auth::user();
        $quantityToAdd = $request->input('quantity', 1);
        $product = Product::find($productId);
        // Find the cart for this user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartEntry = ProductCart::where([
            'cart_id' => $cart->id,
            'product_id' => $productId,
        ])->first();

        // Verifi the quantity available
        $quantityInCart = $cartEntry ? $cartEntry->quantity : 0;
        $availableQuantity = $product->quantity - $quantityInCart;
        if ($quantityToAdd > $availableQuantity) {
            return redirect()->back()->withErrors(['quantity' => 'Quantité non disponible']);
        }

        if (!$cartEntry) {
            $product = Product::find($productId);
            $cartEntry = ProductCart::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantityToAdd,
                'unit_price' => $product->price,
            ]);
        } else {
            $cartEntry->quantity += $quantityToAdd;
            $cartEntry->save();
        }

        $cartEntry->save();

        return redirect()->route('cart.show');
    }


    public function removeProduct($productId)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            // Delete product from cart
            $cart->products()->detach($productId);
        }

        return redirect()->route('cart.show');
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
    public function show() {
        $cart = $this->cartService->getCart();
        $totalPrice = $this->cartService->getTotalPrice($cart);

        return view('cart.show', ['cart' => $cart, 'totalPrice' => $totalPrice]);
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

    public function updateProduct(Request $request, $productId)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        $selectedQuantity = $request->input('quantity');
        $cartEntry = ProductCart::where([
            'cart_id' => $cart->id,
            'product_id' => $productId,
        ])->first();

        if ($cartEntry) {
            $cartEntry->quantity = $selectedQuantity;
            $cartEntry->save();
        }

        return redirect()->route('cart.show');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
