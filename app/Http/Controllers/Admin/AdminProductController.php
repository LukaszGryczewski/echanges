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
        $products = Product::where('isAvailable', 1)->orderBy('name', 'asc')->paginate(15);

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
            'weight' => ['required', 'numeric'],
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
            'weight' => $request->weight,
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
            'weight' => ['required', 'numeric'],
            'edition' => ['required', 'string', 'max:60'],
            'condition' => ['required', 'string', 'in:Neuf,Parfait,Très bon,Bon,Moyen,Mauvais,Très Mauvais'],
            'image' => ['nullable', 'image'],


        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $product = Product::find($id);
        $product->fill($validated); // Remplit les attributs modifiés
        $product->save();

        return redirect()->route('product.show', ['id' => $product->id]);
        /*return view('product.show', [
            'product' => $product,
        ]);*/
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            // Delete carts
            $product->carts()->detach();

            // Delete comments
            foreach ($product->comments as $comment) {
                $comment->delete();
            }

            $product->delete();
        }
        return redirect()->route('admin.product.index');
    }

    public function productsCheckDelete(Request $request)
    {
        $selectedProducts = $request->input('selected_products');

        if ($selectedProducts) {
            foreach ($selectedProducts as $productId) {
                $product = Product::find($productId);

                if ($product) {
                    $product->carts()->detach();

                    foreach ($product->comments as $comment) {
                        $comment->delete();
                    }

                    $product->delete();
                }
            }

            return redirect()->route('admin.product.index')->with('success', 'Les produits sélectionnés ont été supprimés avec succès.');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Aucun produit sélectionné.');
        }
    }
}
