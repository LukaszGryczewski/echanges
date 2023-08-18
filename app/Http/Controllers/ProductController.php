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
        $products = Product::where('isAvailable', 1)->get();
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
     * product the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('product.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'edition' => ['required', 'string', 'max:60'],
            'condition' => ['required', 'string', 'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais'],
            'image' => ['required', 'image'],
            'type_transaction' => ['required', 'string', 'in:Vente,Echange'],

        ]);

        $user = Auth::user();

        // Recup the id of the type
        $typeId = $request->input('type');

        $type = Type::findOrFail($typeId);

        // Upload image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = 'default_image.png';
        }
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'edition' => $request->edition,
            'user_id' => $user->id,
            'type_id' => $type->id,
            'condition' => $request->condition,
            'image' => $imagePath,
            'type_transaction' => $request->type_transaction,
            'isAvailable' => true,
        ]);


        $product->save();

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
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

    /**
     * product the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validation od the form
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'edition' => ['required', 'string', 'max:60'],
            'condition' => ['required', 'string', 'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais'],
            'image' => ['nullable', 'image'],
            'type_transaction' => ['required', 'string', 'in:Vente,Echange'],

        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $product = Product::find($id);
        $product->fill($validated); // Remplit les attributs modifiés
        $product->save();

        return view('product.show', [
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Product::destroy($id);
        $product = Product::with('comments')->find($id);
        if ($product) {
            // Delete the comment of the product
            foreach ($product->comments as $comment) {
                $comment->delete();
            }
            $product->delete();
        }
        return redirect()->route('product.userProduct');
    }

    public function showProductsPerUser()
    {
        // Retrieve logged in user by session
        $connectedUser = auth()->user();

        // Load products associated with logged in user
        $myProducts = Product::where('user_id', $connectedUser->id)->get();
        return view('product.userProduct', compact('myProducts'));
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

        $products = $productsQuery->get();

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







    /*public function search(Request $request)
    {
        $query = $request->input('query');

        // Search the product by name, description, price, edition
        $products = Product::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->orWhere('price', 'LIKE', "%$query%")
                ->orWhere('edition', 'LIKE', "%$query%");
        })
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('login', 'LIKE', "%$query%");
            })
            ->where('isAvailable', 1)
            ->get();

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

        return view('product.index', [
            'products' => $products,
            'resource' => 'résultats de la recherche pour : ' . $query,
            'maxQuantities' => $maxQuantities,
        ]);
    }*/
}
