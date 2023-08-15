@extends('layouts.app')

@section('content')
    <h1>{{ __('Confirmez votre panier') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('Nom du produit') }}</th>
                <th>{{ __('Prix') }}</th>
                <th>{{ __('Quantité') }}</th>
                <th>{{ __('Total pour ce produit') }}</th>
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
                    <td colspan="4">{{ __('Votre panier est vide') }}.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <p>{{ __('Prix total') }}: {{ $totalPrice }} €</p>
    <a href="{{ route('order.address-payment') }}" class="btn btn-primary">{{ __('Continuer') }}</a>
@endsection
