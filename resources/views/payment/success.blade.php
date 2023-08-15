@extends('layouts.app')

@section('content')
    <h1>{{ __('Commande réussie') }}!</h1>
    <p>{{ __('Votre commande a été passée avec succès. Merci de faire vos achats avec nous!') }}</p>
    <a href="{{ route('product.index') }}" class="btn btn-primary">{{ __('Retour à la page d\'accueil') }}</a>
    <td><a href="{{ route('invoice.show', $invoice->id) }}">{{ __('Facture') }}</a></td>

    <!-- Link for dowland the invoice PDF -->
    @if (!empty($invoice->invoice_path))
        <a href="{{ route('invoice.download', $invoice->id) }}"
            class="btn btn-secondary">{{ __('Télécharger votre facture') }}</a>
    @endif
@endsection
