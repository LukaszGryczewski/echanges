@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Effectuer le paiement') }}</h2>

    <form action="{{ route('payment.process', ['orderId' => $order->id]) }}" method="POST" id="payment-form">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="card-element">{{ __('Informations de carte de crédit') }}:</label>
            <div id="card-element">
                <!-- Un div où Stripe UI s'affichera -->
            </div>
            <!-- Afficher les erreurs de validation de carte dans cet élément -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Payer et finaliser la commande') }}</button>
    </form>
</div>

<!-- Intégration du JS de Stripe -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    // Créez une nouvelle instance de Stripe avec votre clé API publique
    var stripe = Stripe('{{ config("services.stripe.key") }}');
    var elements = stripe.elements();

    // Créez une instance du composant card pour la saisie des détails de carte
    var card = elements.create('card');
    card.mount('#card-element');

    // Gérer la validation en temps réel des détails de la carte
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Gérer la soumission du formulaire
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    });
</script>
@endsection
