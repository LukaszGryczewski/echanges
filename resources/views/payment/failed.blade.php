@extends('layouts.app')

@section('content')
    <h1>Commande echouée!</h1>
    <p>Votre commande n'as pas ete finailisée avec succès !</p>
    <a href="{{ route('product.index') }}" class="btn btn-primary">Retour à la page d'accueil</a>
@endsection
