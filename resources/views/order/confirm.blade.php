@extends('layouts.app')

@section('content')
    <h1>{{ __('Confirmez votre panier') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('Vendeur') }}</th>
                <th>{{ __('Nom du produit') }}</th>
                <th>{{ __('Prix') }}</th>
                <th>{{ __('Quantité') }}</th>
                <th>{{ __('Total de la commande') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($groupedProducts->isNotEmpty())
                @foreach ($groupedProducts as $vendorId => $products)
                    @php
                        $vendorName = \App\Models\User::find($vendorId)->login;
                        $vendorShippingCost =
                            $products->sum(function ($product) {
                                return $product->pivot->quantity * $product->pivot->unit_price;
                            }) + $shippingCostPerVendor;
                    @endphp
                    @foreach ($products as $product)
                        <tr>
                            @if ($loop->first)
                                <td rowspan="{{ $products->count() }}">{{ $vendorName }}</td>
                            @endif
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->unit_price }} €</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->pivot->unit_price * $product->pivot->quantity }} €</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>{{ __('Frais de livraison pour') }} {{ $vendorName }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $shippingCostPerVendor }} €</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">{{ __('Votre panier est vide') }}.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <p>{{ __('Prix total') }}: {{ $totalPrice }} €</p>
    <a href="{{ route('order.address-payment') }}" class="btn btn-primary">{{ __('Continuer') }}</a>
@endsection
