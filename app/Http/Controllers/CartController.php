<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addProduct(Request $request, $productId)
    {
        $user = Auth::user();
        $quantityToAdd = $request->input('quantity', 1);
            $product = Product::find($productId);
        // Trouver le panier pour cet utilisateur
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Rechercher une entrée dans la table pivot pour ce produit et ce panier
        $cartEntry = ProductCart::where([
            'cart_id' => $cart->id,
            'product_id' => $productId,
        ])->first();

            // Vérifier la quantité disponible
            $quantityInCart = $cartEntry ? $cartEntry->quantity : 0;
            $availableQuantity = $product->quantity - $quantityInCart;
            if ($quantityToAdd > $availableQuantity) {
            return redirect()->back()->withErrors(['quantity' => 'Quantité non disponible']);
            }

        // Si l'entrée n'existe pas, créez-la
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
            // Supprimer le produit du panier
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
    public function show()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('products')->first();

        if (!$cart) {
            return view('cart.show')->with('cart', null);
        } else {
            // Récupère les produits du panier avec les détails de la relation pivot
            $products = ProductCart::with('product')->where('cart_id', $cart->id)->get();
        }

        $totalPrice = 0;
        foreach ($cart->products as $product) {
            $totalPrice += $product->pivot->unit_price * $product->pivot->quantity;
        }

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
