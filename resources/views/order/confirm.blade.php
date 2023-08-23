@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('Confirmez votre panier') }}</h1>

        <div class="delivery-options">
            <label>{{ __('Choisissez une option de livraison') }}:</label>
            <select name="delivery_option" id="deliveryOptions">
                @foreach ($availableOptions as $type => $cost)
                    <option value="{{ $type }}" data-cost="{{ $cost }}">{{ ucfirst($type) }} -
                        {{ $cost }} €</option>
                @endforeach
            </select>
        </div>

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
                @foreach ($preparedProducts as $productData)
                    <tr>
                        @if ($productData['isFirst'])
                            <td rowspan="{{ $productData['rowCount'] }}">{{ $productData['vendorName'] }}</td>
                        @endif
                        <td>{{ $productData['productName'] }}</td>
                        <td>{{ $productData['unitPrice'] }} €</td>
                        <td>{{ $productData['quantity'] }}</td>
                        <td>{{ $productData['totalOrderPrice'] }} €</td>
                    </tr>
                @endforeach
                <tr id="deliveryCostRow" style="display: none;">
                    <td colspan="4">{{ __('Coût de livraison') }}</td>
                    <td id="deliveryCost">0 €</td>
                </tr>

                @if ($groupedProducts->isEmpty())
                    <tr>
                        <td colspan="5">{{ __('Votre panier est vide') }}.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <p>{{ __('Prix total') }}: <span id="totalPriceDisplay">{{ $totalPrice }} €</span></p>

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
