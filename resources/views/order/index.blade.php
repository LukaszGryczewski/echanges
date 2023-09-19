@extends('layouts.app')

@section('title', __('List des commandes'))

@section('content')
    <h1>{{ __('Liste des commandes') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('N° commande') }}</th>
                <th>{{ __('Utilisateur') }}</th>
                <th>{{ __('Date de commande') }}</th>
                <th>{{ __('Prix total') }} (€)</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->login }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total_price }} €</td>
                    <td>
                        <div class="gap-2 d-flex align-items-center">
                            <!-- Bouton Détails -->
                            <a href="{{ route('order.show', $order->id) }}"
                                class="btn btn-success btn-sm">{{ __('Détails') }}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
