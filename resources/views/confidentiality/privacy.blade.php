@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="my-4">{{ __('Politique de Confidentialité') }}</h1>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Traitement des données') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Lorsque vous passez une commande via notre site web, nous collectons et traitons les informations personnelles que vous nous transmettez. Cela peut inclure des données d\'identification telles que votre nom, adresse, adresse e-mail, ainsi que des informations relatives à votre mode de paiement. De plus, nous collectons des \'données de trafic\' concernant les visiteurs de notre site web, ce qui implique l\'enregistrement de l\'adresse IP de votre ordinateur et l\'analyse du comportement des utilisateurs. Ces données sont collectées dans le but exclusif de traiter votre commande, améliorer nos services, et optimiser le contenu de notre site web. Conformément au Règlement Général sur la Protection des Données (RGPD), nous conservons vos données uniquement pour la durée strictement nécessaire.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Protection des données') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Des mesures de sécurité renforcées sont en place pour garantir la protection des données que nous traitons, afin d\'éviter tout accès non autorisé à ces informations.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Partage des données') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Soyez assurés que nous ne vendons ni ne partageons vos données avec des tiers, à l\'exception de ceux directement impliqués dans le processus d\'exécution de votre commande. Tous nos collaborateurs et les tiers avec lesquels nous collaborons sont tenus de garantir la confidentialité de vos informations.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Tarifs') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Les prix de nos produits sont indiqués en euros, toutes taxes comprises (TVA). La propriété des produits demeure celle de Treasures jusqu\'au paiement complet du prix.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('La Validation') }}</h4>
        </div>
        <div class="card-body">
            {{ __('En validant votre commande, vous confirmez avoir lu, compris et accepté nos Conditions générales de vente.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Livraison') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Les produits sont livrés à l\'adresse que vous fournissez lors de votre commande avec un délai de 14 jours. En cas de retard d\'expédition ou de livraison, nous vous informerons et proposerons une nouvelle date de livraison. Si la livraison accuse un retard de plus de 30 jours après la commande, vous pouvez résilier le contrat selon les conditions de l\'Article L 216-2 du Code de la consommation.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Droit de rétractation') }}</h4>
        </div>
        <div class="card-body">
            {{ __('En accord avec les lois en vigueur, vous disposez d\'un délai de 14 jours pour révoquer votre achat sans justifier de motifs. Seul le prix du ou des produits et les frais d\'expédition vous seront remboursés. Les produits retournés doivent être dans leur état original et complet, avec un justificatif d\'achat. Le remboursement sera effectué dans un délai de 14 jours après la réception des produits retournés.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Paiement sécurisé') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Pour garantir la sécurité de vos transactions, nous utilisons le système de paiement sécurisé de Stripe, qui accepte les cartes Visa et Mastercard.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Communications téléphoniques') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Si vous choisissez de partager votre numéro de téléphone avec nous, nous ne l\'utiliserons que pour discuter de questions pertinentes à vos commandes en ligne.') }}
        </div>
    </div>

    <div class="mb-4 card">
        <div class="card-header">
            <h4>{{ __('Contact') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Pour toute question ou préoccupation concernant notre politique de confidentialité, n\'hésitez pas à nous contacter par e-mail.') }}
        </div>
    </div>

</div>

@endsection
