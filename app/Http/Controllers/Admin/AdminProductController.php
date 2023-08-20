<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user = Auth::user();
        $products = Product::where('isAvailable', 1)->get();

        return view('admin.product.index', [
            'products' => $products,
            'resource' => 'produits',
        ]);

    }

    /**
     * product the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.product.create', compact('types'));
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

        return redirect()->route('admin.product.index')
            ->with('success', 'Product created successfully.');
    }


    /**
     * product the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('admin.product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validation of the form
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

    public function destroy(string $id)
    {

        // Product::destroy($id);
        $product = Product::find($id);

    if ($product) {
        // Supprime les associations du produit dans la table product_cart
        $product->carts()->detach();

        // Supprime les commentaires du produit
        foreach ($product->comments as $comment) {
            $comment->delete();
        }

        // Supprime le produit lui-même
        $product->delete();
    }
        return redirect()->route('admin.product.index');
    }


}
