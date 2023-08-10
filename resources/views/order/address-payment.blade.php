@extends('layouts.app')

@section('content')
    <h1>Adresse de Livraison et Mode de Paiement</h1>
    <form action="{{ route('order.finalize') }}" method="post">
        @csrf
        <div>
            <label for="delivery_address">Adresse de Livraison:</label>
            <input type="text" name="delivery_address" required>
        </div>
        <div>
            <label for="payment_method">Méthode de Paiement:</label>
            <select name="payment_method" required>
                <option value="card">Carte</option>
                <option value="paypal">PayPal</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Finaliser la Commande</button>
    </form>
@endsection
