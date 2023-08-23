@extends('layouts.app')

@section('content')
    <h1>{{ __('Commande echouée') }}!</h1>
    <p>{{ __('Votre commande n\'as pas ete finailisée avec succès') }} !</p>
    <a href="{{ route('product.index') }}" class="btn btn-success">{{ __('Retour à la page d\'accueil') }}</a>
@endsection
