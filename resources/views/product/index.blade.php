@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom du produit</th>
                    <th>Edition</th>
                    <th>Utilisateur</th>
                    <th>Condition</th>
                    <th>Transaction</th>
                    <th>Prix (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @if ($product->image)
                                <img src="{{ $product->image_url  }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                            @endif
                        </td>
                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->edition }}</td>
                        <td>{{ $product->user->login }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->type_transaction }}</td>
                        <td>{{ $product->price }}</td>
                        @auth
                        <td>

                            <form action="{{ route('cart.addProduct', $product->id) }}" method="POST">
                                @csrf
                                <label for="quantity">Quantité :</label>
                                @if ($maxQuantities[$product->id] == 0)
            <input type="number" name="quantity" id="quantity" min="0" max="0" value="0" disabled>
            <span>Produit épuisé</span>
        @else
            <input type="number" name="quantity" id="quantity" min="1" max="{{ $maxQuantities[$product->id] }}" value="1">
            <button type="submit">Ajouter au panier</button>
        @endif
                            </form>
                    </td>
                    @endauth
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection
