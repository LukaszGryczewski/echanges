@extends('layouts.app')

@section('title', __('Détails de la commande'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="mt-3 text-center">
                        <img src="{{ asset('storage/' . $order->profile_image) }}" alt="{{ $order->login }}"
                            class="card-img-top img-fluid rounded-circle profile-image">
                    </div>
                    <div class="card-body">
                        <h1 class="mb-4 card-title">{{ __('N° commande : ') }} {{ $order->id }}</h1>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>{{ __('Utilisateur') }}</strong></td>
                                    <td>{{ $order->user->login }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Date de commande') }}</strong></td>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Prix total') }}</strong></td>
                                    <td>{{ $order->total_price }} €</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Prix de livraison') }}</strong></td>
                                    <td>{{ $order->shipping_cost }} €</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Adresse de livraison') }}</strong></td>
                                    <td>{{ $order->delivery_address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Poids') }}</strong></td>
                                    <td>{{ $order->weight }} g</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Status') }}</strong></td>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-body">
                            @if ($cart)
                                <h2 class="mb-4 card-title">Produits de la commande</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID produit') }}</th>
                                            <th>{{ __('Nom du produit') }}</th>
                                            <th>{{ __('Quantité') }}</th>
                                            <th>{{ __('Prix unitaire') }}</th>
                                            <th>{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                                <td>{{ $product->pivot->unit_price }} €</td>
                                                <td>{{ $product->pivot->quantity * $product->pivot->unit_price }} €</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <a class="btn btn-success" href="{{ route('order.index') }}">{{ __('Retour') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
