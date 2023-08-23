export function initializeStripePayment() {
    // Créez une nouvelle instance de Stripe avec votre clé API publique
    let stripe = Stripe(window.stripeKey);  // On utilise window.stripeKey pour avoir accès à la clé depuis l'extérieur
    let elements = stripe.elements();

    // Créez une instance du composant card pour la saisie des détails de carte
    let card = elements.create('card');
    card.mount('#card-element');

    // Gérer la validation en temps réel des détails de la carte
    card.addEventListener('change', function(event) {
        let displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Gérer la soumission du formulaire
    let form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                let errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                let hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    });
}
