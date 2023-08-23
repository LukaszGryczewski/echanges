@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="mb-4 text-center">{{ __('Mes Factures') }}</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('Facture n°') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th>{{ __('Date de facturation') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->amount }} {{ $invoice->currency }}</td>
                                <td>{{ $invoice->billing_date }}</td>
                                <td>
                                    <a href="{{ route('invoice.show', $invoice->id) }}"
                                        class="btn btn-success btn-sm">{{ __('Voir') }}</a>
                                    <a href="{{ route('invoice.download', $invoice->id) }}"
                                        class="btn btn-secondary btn-sm">{{ __('Télécharger') }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">{{ __('Aucune facture trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
