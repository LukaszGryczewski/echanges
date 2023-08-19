@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{ __('Créer une commande') }}</h2>

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
                    <option value="card">{{ __('Carte bancaire') }}</option>
                    <option value="paypal">{{ __('PayPal') }}</option>
                </select>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">{{ __('Continuer vers le paiement') }}</button>
        </form>
    </div>
@endsection
