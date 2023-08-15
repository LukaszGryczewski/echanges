@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Facture n°') }} {{ $invoice->id }}</h2>
        <p>{{ __('Commande ID') }} : {{ $invoice->order_id }}</p>
        <p>{{ __('Montant') }} : {{ $invoice->amount }} {{ $invoice->currency }}</p>
        <p>{{ __('Date de facturation') }} : {{ $invoice->billing_date }}</p>
        <p>{{ __('Détails') }} : {{ $invoice->details }}</p>

        <h3>{{ __('Produits commandés') }} :</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Nom du produit') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Quantité') }}</th>
                    <th>{{ __('Prix unitaire') }}</th>
                    <th>{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->unit_price }}</td>
                        <td>{{ $product->pivot->quantity * $product->pivot->unit_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
