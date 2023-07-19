@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Edition</th>
            <th>Utilisateur</th>
            <th>Condition</th>
            <th>Transaction</th>
            <th>Prix</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                @endif
                <td>
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </td>
                <td>{{ $product->edition }}</td>
                <td>{{ $product->user->login }}</td>
                <td>{{ $product->condition }}</td>
                <td>{{ $product->type_transaction }}</td>
                <td>{{ $product->price }} €</td>

            </tr>
        @endforeach
    </tbody>

</table>
@endsection
