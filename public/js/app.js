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
    const chosenDeliveryCostInput = document.getElementById('chosenDeliveryCost');

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
        chosenDeliveryCostInput.value = deliveryCost.toFixed(2);
    });
    deliveryOptionsSelect.dispatchEvent(new Event('change'));
});


document.addEventListener("DOMContentLoaded", function() {
    // Écouteur pour le bouton de suppression de compte
    const deleteBtn = document.getElementById('delete-account-btn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function(e) {
            const isConfirmed = confirm('Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible.');
            if (!isConfirmed) {
                e.preventDefault();
            }
        });
    }

    // Écouteur pour le bouton "sélectionner tout"
    const selectAllBtn = document.getElementById('select-all');
    if (selectAllBtn) {
        selectAllBtn.addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for(const checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    }

});


function confirmDelete(actionUrl) {
    if (window.confirm('Êtes-vous sûr de vouloir supprimer cet produit? Cette action est irréversible.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = actionUrl;
        form.innerHTML = '<input type="hidden" name="_token" value="' + document.querySelector('meta[name="csrf-token"]').getAttribute('content') + '"><input type="hidden" name="_method" value="DELETE">';
        document.body.appendChild(form);
        form.submit();
    }
}
