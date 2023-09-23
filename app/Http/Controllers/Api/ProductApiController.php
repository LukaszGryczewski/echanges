<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::where('isAvailable', 1)->orderBy('name', 'asc')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'|'string'|'max:255',
            'price' => 'required'|'numeric',
            'quantity' => 'required'|'integer',
            'edition' => 'required'|'string'|'max:60',
            'weight' => 'required'|'numeric',
            'condition' => 'required'|'string'|'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais',
            'image' => 'required'|'image',
            'type_transaction' => 'required'|'string'|'in:Vente,Echange',

        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product_images', 'public');
            $validatedData['image'] = $path;
        }

        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'|'string'|'max:255',
            'price' => 'required'|'numeric',
            'quantity' => 'required'|'integer',
            'edition' => 'required'|'string'|'max:60',
            'weight' => 'required'|'numeric',
            'condition' => 'required'|'string'|'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais',
            'image' => 'required'|'image',
            'type_transaction' => 'required'|'string'|'in:Vente,Echange',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image from storage
            Storage::disk('public')->delete($product->image);

            $path = $request->file('image')->store('product_images', 'public');
            $validatedData['image'] = $path;
        }

        $product->update($validatedData);
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(null, 204);
    }
}
