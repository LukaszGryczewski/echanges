@extends('layouts.app')

@section('content')
    <h1>Commande réussie!</h1>
    <p>Votre commande a été passée avec succès. Merci de faire vos achats avec nous!</p>
    <a href="{{ route('product.index') }}" class="btn btn-primary">Retour à la page d'accueil</a>
@endsection
