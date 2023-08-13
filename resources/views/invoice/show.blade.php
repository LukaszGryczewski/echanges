@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Facture n° {{ $invoice->id }}</h2>
        <p>Commande ID: {{ $invoice->order_id }}</p>
        <p>Montant: {{ $invoice->amount }} {{ $invoice->currency }}</p>
        <p>Date de facturation: {{ $invoice->billing_date }}</p>
        <p>Détails : {{ $invoice->details }}</p>

        <h3>Produits commandés:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
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
