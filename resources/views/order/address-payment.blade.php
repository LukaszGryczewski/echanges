@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Créer une commande</h2>

    <form action="{{ route('order.finalize') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="delivery_address">Adresse de livraison:</label>
            <input type="text" class="form-control" name="delivery_address" id="delivery_address" placeholder="Votre adresse de livraison" required>
        </div>
        <div>
            <label for="payment_method">Méthode de Paiement:</label>
            <select name="payment_method" required>
                <option value="card">Carte bancaire</option>
                <option value="paypal">PayPal</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Continuer vers le paiement</button>
    </form>
</div>
@endsection
