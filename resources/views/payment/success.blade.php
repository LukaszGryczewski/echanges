@extends('layouts.app')

@section('content')
    <h1>Commande réussie!</h1>
    <p>Votre commande a été passée avec succès. Merci de faire vos achats avec nous!</p>
    <a href="{{ route('product.index') }}" class="btn btn-primary">Retour à la page d'accueil</a>
    <td><a href="{{ route('invoice.show', $invoice->id) }}">facture</a></td>

    <!-- Link for dowland the invoice PDF -->
    @if (!empty($invoice->invoice_path))
        <a href="{{ route('invoice.download', $invoice->id) }}" class="btn btn-secondary">Télécharger votre facture</a>
    @endif
@endsection
