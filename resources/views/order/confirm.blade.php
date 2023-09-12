@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5 text-center">{{ __('Confirmez votre panier') }}</h1>

        <div class="mb-3 delivery-options">
            <label>{{ __('Choisissez une option de livraison') }}:</label>
            <select name="delivery_option" id="deliveryOptions" class="form-select">
                @foreach ($availableOptions as $type => $cost)
                    <option value="{{ $type }}" data-cost="{{ $cost }}">{{ ucfirst($type) }} -
                        {{ $cost }} €</option>
                @endforeach
            </select>
        </div>

        @if ($groupedProducts->isNotEmpty())
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Nom du produit') }}</th>
                        <th>{{ __('Prix unitaire') }}</th>
                        <th>{{ __('Quantité') }}</th>
                        <th>{{ __('Total de la commande') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preparedProducts as $productData)
                        <tr>
                            <td>{{ $productData['productName'] }}</td>
                            <td>{{ $productData['unitPrice'] }} €</td>
                            <td>{{ $productData['quantity'] }}</td>
                            <td>{{ $productData['totalOrderPrice'] }} €</td>
                        </tr>
                    @endforeach

                    <tr id="deliveryCostRow">
                        <td colspan="3">{{ __('Coût de livraison') }}</td>
                        <td id="deliveryCost">0 €</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>{{ __('Prix total') }}</strong></td>
                        <td><strong id="totalPriceDisplay">{{ $totalPrice }} €</strong></td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="text-center alert alert-info">{{ __('Votre panier est vide') }}</div>
        @endif
        <h2>{{ __('Informations de livraison et paiement') }}</h2>

        <form action="{{ route('order.finalize') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="delivery_address">{{ __('Adresse de livraison') }}:</label>
                <input type="text" class="form-control" name="delivery_address" id="delivery_address"
                    placeholder="exemple: Rue de la soie 45 1000 Bruxelles" required>
            </div>
            <div>
                <label for="payment_method">{{ __('Méthode de Paiement') }}:</label>
                <select name="payment_method" required>
                    <option value="card">{{ __('Carte') }}</option>
                </select>
            </div>

            <input type="hidden" name="chosen_delivery_cost" id="chosenDeliveryCost" value="0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-success">{{ __('Continuer vers le paiement') }}</button>
        </form>
    </div>
@endsection
