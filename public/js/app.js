//import { initializeStripePayment } from './stripePayment';

//Button view hiden password
$(document).ready(function () {
    $('#showPassword').on('mousedown', function () {
        $('#password').attr('type', 'text');
    }).on('mouseup mouseleave', function () {
        $('#password').attr('type', 'password');
    });
});


document.addEventListener("DOMContentLoaded", function(){
    const showCommentsButton = document.getElementById('show-comments');
    const commentsSection = document.getElementById('comments-section');

    if (showCommentsButton && commentsSection) {
        showCommentsButton.addEventListener('click', function(){
            commentsSection.style.display = commentsSection.style.display === 'none' ? '' : 'none';
        });
    }
});

/* Type livraision */
document.addEventListener('DOMContentLoaded', function() {
    const deliveryOptionsSelect = document.getElementById('deliveryOptions');
    if (!deliveryOptionsSelect) return; // Sortez si l'élément n'existe pas sur la page

    const deliveryCostRow = document.getElementById('deliveryCostRow');
    const deliveryCostDisplay = document.getElementById('deliveryCost');
    const totalPriceDisplay = document.getElementById('totalPriceDisplay');
    const chosenDeliveryCostInput = document.getElementById('chosenDeliveryCost'); // Nouveau

    let initialTotalPrice = parseFloat(totalPriceDisplay.textContent);

    deliveryOptionsSelect.addEventListener('change', function() {
        const selectedOptionValue = this.options[this.selectedIndex].value;
        let deliveryCost = parseFloat(this.options[this.selectedIndex].getAttribute('data-cost'));

        if (isNaN(deliveryCost)) {
            deliveryCost = 0;
        }

        deliveryCostDisplay.textContent = deliveryCost.toFixed(2) + ' €';
        deliveryCostRow.style.display = 'table-row';
        totalPriceDisplay.textContent = (initialTotalPrice + deliveryCost).toFixed(2) + ' €';
        chosenDeliveryCostInput.value = deliveryCost.toFixed(2); // Nouveau
    });
    deliveryOptionsSelect.dispatchEvent(new Event('change'));
});

/* Payment Strip */
//initializeStripePayment();

