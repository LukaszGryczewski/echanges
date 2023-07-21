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
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                            @endif
                        </td>
                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->edition }}</td>
                        <td>{{ $product->user->login }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->type_transaction }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
