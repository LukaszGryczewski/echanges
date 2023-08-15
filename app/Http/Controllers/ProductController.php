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
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        $products = Product::all();
        return view('product.index', [
            'products' => $products,
            'resource' => 'produits',
        ]);
    }*/

    public function index()
{
    $user = Auth::user();
    //$products = Product::all();
    $products = Product::where('isAvailable', 1)->get();

    // Récupérez le panier de l'utilisateur
    $cart = Cart::where('user_id', $user->id)->first();
    $maxQuantities = [];
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

        // Récupérez l'ID du type à partir de la requête
        $typeId = $request->input('type');
        // Trouvez le type correspondant dans la base de données
        $type = Type::findOrFail($typeId);

        // Traitement de l'upload de l'image
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
        //Validation des données du formulaire
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'edition' => ['required', 'string', 'max:60'],
            'condition' => ['required', 'string', 'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais'],
            'image' => ['required', 'image'],
            'type_transaction' => ['required', 'string', 'in:Vente,Echange'],

        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $product = Product::find($id);
        $product->fill($validated); // Remplit les attributs modifiés
        $product->save(); // Enregistre les modifications

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
            // Supprimer les commentaires associés au produit
            foreach ($product->comments as $comment) {
                $comment->delete();
            }

            // Supprimer le produit
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
}
