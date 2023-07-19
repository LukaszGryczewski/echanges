@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')



                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                @endif
                <h1>Nom : {{ $product->name }}</h1>
                <p>Edition : {{ $product->edition }}</p>
                <p>Type : {{ $product->type->type }}</p>
                <p>Description : {{ $product->description }}</p>
                <p>Quantité : {{ $product->quantity }}</p>
                <p>Utilisateur : {{ $product->user->login }}</p>
                <p>Condition : {{ $product->condition }}</p>
                <p>Transaction :{{ $product->type_transaction }}</p>
                <p>Prix : {{ $product->price }} €</p>


@endsection
