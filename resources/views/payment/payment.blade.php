@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <!-- Contenu principal -->
        <div class="container flex-grow-1 d-flex flex-column justify-content-center">
            <!-- d-flex et justify-content-center vont pousser le contenu au centre, mais permettreont une croissance (flex-grow-1) pour utiliser tout l'espace disponible -->
            <div class="mx-auto card w-50"> <!-- mx-auto centrera horizontalement la carte -->
                <div class="card-body">
                    <h2 class="card-title">{{ __('Effectuer le paiement') }}</h2>

                    <form action="{{ route('payment.process', ['orderId' => $order->id]) }}" method="POST" id="payment-form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="card-element">{{ __('Informations de carte de crédit') }}:</label>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button type="submit" class="btn btn-success">{{ __('Payer et finaliser la commande') }}</button>
                    </form>
                </div>

                <!-- Intégration du JS de Stripe -->
                <script src="https://js.stripe.com/v3/"></script>

                <script>
                    // Créez une nouvelle instance de Stripe avec votre clé API publique
                    var stripe = Stripe('{{ config('services.stripe.key') }}');
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
