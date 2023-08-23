<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Type;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $products = Product::where('isAvailable', 1)->paginate(15);

        $maxQuantities = [];

        // Recup the cart of the user
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();

            if ($cart) {
                foreach ($products as $product) {
                    $quantityInCart = $cart->products->where('id', $product->id)->first()->pivot->quantity ?? 0;
                    $maxQuantities[$product->id] = $product->quantity - $quantityInCart;
                }
            } else {
                foreach ($products as $product) {
                    $maxQuantities[$product->id] = $product->quantity;
                }
            }
        } else {
            foreach ($products as $product) {
                $maxQuantities[$product->id] = $product->quantity;
            }
        }

        return view('product.index', [
            'products' => $products,
            'resource' => 'produits',
            'maxQuantities' => $maxQuantities,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('comments.user')->find($id);

        return view('product.show', [
            'product' => $product
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $priceOrder = $request->input('price_order');

        $productsQuery = Product::where('isAvailable', 1)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', "%$query%")
                    ->orWhere('description', 'LIKE', "%$query%")
                    ->orWhere('price', 'LIKE', "%$query%")
                    ->orWhere('edition', 'LIKE', "%$query%")
                    ->orWhereHas('user', function ($q) use ($query) {
                        $q->where('login', 'LIKE', "%$query%");
                    });
            });

        $productsQuery->where('quantity', '>', 0);
        // Appliquer le filtre par type
        if ($request->has('type_id') && !empty($request->input('type_id'))) {
            $productsQuery->where('type_id', $request->input('type_id'));
        }
        // Appliquer le filtre par édition
        if ($request->has('edition') && !empty($request->input('edition'))) {
            $productsQuery->where('edition', $request->input('edition'));
        }

        // Appliquer le filtre par condition
        if ($request->has('condition') && !empty($request->input('condition'))) {
            $productsQuery->where('condition', $request->input('condition'));
        }

        // Tri des résultats en fonction du choix de l'utilisateur
        if ($request->input('price_order') == "priceAsc") {
            $productsQuery->orderBy('price', 'asc');
        } elseif ($request->input('price_order') == "priceDesc") {
            $productsQuery->orderBy('price', 'desc');
        }

        $products = $productsQuery->paginate(15);

        $user = Auth::user();
        $maxQuantities = [];

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();

            if ($cart) {
                foreach ($products as $product) {
                    $quantityInCart = $cart->products->where('id', $product->id)->first()->pivot->quantity ?? 0;
                    $maxQuantities[$product->id] = $product->quantity - $quantityInCart;
                }
            } else {
                foreach ($products as $product) {
                    $maxQuantities[$product->id] = $product->quantity;
                }
            }
        } else {
            foreach ($products as $product) {
                $maxQuantities[$product->id] = $product->quantity;
            }
        }

        $editions = Product::select('edition')->distinct()->pluck('edition');
        $conditions = Product::select('condition')->distinct()->pluck('condition');

        return view('product.index', [
            'products' => $products,
            'resource' => 'résultats de la recherche pour : ' . $query,
            'maxQuantities' => $maxQuantities,
            'editions' => $editions,
            'conditions' => $conditions
        ]);
    }
}
