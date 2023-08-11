@extends('layouts.app')

@section('content')
    <h1>Confirmez votre panier</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total pour ce produit</th>
            </tr>
        </thead>
        <tbody>
            @if ($cart)
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->unit_price }} €</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->unit_price * $product->pivot->quantity }} €</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Votre panier est vide.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <p>Prix total: {{ $totalPrice }} €</p>
    <a href="{{ route('order.address-payment') }}" class="btn btn-primary">Continuer</a>
@endsection
