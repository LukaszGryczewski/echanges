@extends('layouts.app')

@section('content')
    <h2>{{ __('Mes Facture') }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('Facture n°') }}</th>
                <th>{{ __('Montant') }}</th>
                <th>{{ __('Date de facturation') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->amount }} {{ $invoice->currency }}</td>
                    <td>{{ $invoice->billing_date }}</td>
                    <td>
                        <a href="{{ route('invoice.show', $invoice->id) }}">{{ __('Voir') }}</a>
                        |
                        <a href="{{ route('invoice.download', $invoice->id) }}">{{ __('Télécharger') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
