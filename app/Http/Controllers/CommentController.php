<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // Vérifiez si l'utilisateur est authentifié
        if (!$user) {
            return redirect()->back()->with('error', 'Vous devez être connecté pour commenter.');
        }

        $comment = Comment::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'comment' => $request->comment,
            'score' => $request->score,
            'created_at' => now(),
        ]);
        return redirect()->route('product.show', ['id' => $productId])->with('success', 'Commentaire ajouté avec succès.');
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
        $comment = Comment::findOrFail($id);

        // Vérifiez si l'utilisateur connecté est le propriétaire du commentaire
        if (Auth::user()->id !== $comment->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }

        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        // Vérifiez si l'utilisateur connecté est le propriétaire du commentaire
        if (Auth::user()->id !== $comment->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }

        $request->validate([
            'comment' => ['required', 'string', 'max:255'],
            'score' => ['required', 'numeric'],
        ]);

        $comment->update([
            'comment' => $request->comment,
            'score' => $request->score,
        ]);

        return redirect()->route('product.show', $comment->product_id)->with('success', 'Commentaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Commentaire introuvable.');
        }

        $productId = $comment->product_id;

        $comment->delete();

        return redirect()->route('product.show', $productId)->with('success', 'Commentaire supprimé avec succès.');
    }
}
