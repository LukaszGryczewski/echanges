<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\ProductCart;
use Illuminate\Support\Facades\Auth;

class CartService {

    public function getCart() {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('products')->first();
        return $cart;
    }

    public function getTotalPrice($cart) {
        $totalPrice = 0;
        foreach ($cart->products as $product) {
            $totalPrice += $product->pivot->unit_price * $product->pivot->quantity;
        }
        return $totalPrice;
    }

}
