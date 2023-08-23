@extends('layouts.app')

@section('content')
    <h1>{{ __('Commande réussie') }}!</h1>
    <p>{{ __('Votre commande a été passée avec succès. Merci de faire vos achats avec nous!') }}</p>
    <a href="{{ route('product.index') }}" class="btn btn-success">{{ __('Retour à la page d\'accueil') }}</a>

    <!-- Link for dowland the invoice PDF -->
    @if (!empty($invoice->invoice_path))
        <a href="{{ route('invoice.download', $invoice->id) }}"
            class="btn btn-success">{{ __('Télécharger votre facture') }}</a>
    @endif
@endsection
