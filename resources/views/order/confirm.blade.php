@extends('layouts.app')

@section('content')
    <h1>{{ __('Confirmez votre panier') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('Nom du produit') }}</th>
                <th>{{ __('Prix') }}</th>
                <th>{{ __('Quantité') }}</th>
                <th>{{ __('Total de la commande') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($cart)
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->unit_price }} €</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ ($product->pivot->unit_price * $product->pivot->quantity)}} €</td>
                    </tr>
                @endforeach
                <tr>
                    <td>{{ __('Frais de livraison') }}</td>
                    <td></td>
                    <td></td>
                    <td>6.99 €</td>
                </tr>
            @else
                <tr>
                    <td colspan="4">{{ __('Votre panier est vide') }}.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <p>{{ __('Prix total') }}: {{ $totalPrice }} €</p>
    <a href="{{ route('order.address-payment') }}" class="btn btn-primary">{{ __('Continuer') }}</a>
@endsection
