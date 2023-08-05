<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
        return view('product.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'comment' => ['required', 'string', 'max:255'],
            'score' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        $productId = $request->input('product_id'); // Récupérer l'ID du produit depuis le formulaire


        $comment = Comment::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'comment' => $request->comment,
            'score' => $request->score,
            'created_at' => now(),
        ]);
        //dd($comment);

        $comment->save();
        return redirect()->route('product.show', ['id' => $productId])->with('success', 'Commentaire ajouté avec succès.');
        //return redirect()->route('product.show', $productId)->with('success', 'Commentaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
