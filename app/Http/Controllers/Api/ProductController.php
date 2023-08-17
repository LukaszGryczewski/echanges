<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return response()->json($products);

}

public function show($id)
{
    $product = Product::with('comments.user')->find($id);
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }
    return response()->json($product);
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'edition' => 'required|string|max:60',
        'condition' => 'required|string|in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais',
        'type_transaction' => 'required|string|in:Vente,Echange',
        'image' => 'required|image',
        // Ajouter d'autres champs si nécessaire
    ]);

    // Pour l'image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $product = Product::create($data);
    return response()->json($product, 201);
}


public function update(Request $request, $id)
{
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'edition' => 'required|string|max:60',
        'condition' => 'required|string|in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais',
        'type_transaction' => 'required|string|in:Vente,Echange',
        'image' => 'nullable|image',
    ]);

    // Pour l'image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $product->update($data);
    return response()->json($product);
}


public function destroy($id)
{
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->delete();
    return response()->json(['message' => 'Product deleted successfully']);
}

/*public function index()
{
    return Product::paginate(15);
}*/

}
