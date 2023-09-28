@extends('layouts.app')

@section('title', __('List des commandes'))

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">{{ __('Liste des commandes') }}</h1>
        <div class="mb-3">
            <a href="{{ route('order.index') }}" class="btn btn-success">{{ __('Toutes les commandes') }}</a>
            <a href="{{ route('order.index', ['order_status' => 'paid']) }}" class="btn btn-success">{{ __('Commandes Payées') }}</a>
            <a href="{{ route('order.index', ['order_status' => 'delivery']) }}" class="btn btn-success">{{ __('Commandes en Livraison') }}</a>
            <a href="{{ route('order.index', ['order_status' => 'delivered']) }}" class="btn btn-success">{{ __('Commandes Livrées') }}</a>
        </div>
        @if ($orders && $orders->count())
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ __('N° commande') }}</th>
                        <th>{{ __('Utilisateur') }}</th>
                        <th>{{ __('Date de commande') }}</th>
                        <th>{{ __('Prix total') }} (€)</th>
                        <th>{{ __('Commande statut') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="{{ $order->getStatusClass() }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->login }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->total_price }} €</td>
                            <td>{{ $order->order_status }}</td>
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
        @else
            <div class="text-center alert alert-info">{{ __('La liste des commandes est vide') }}</div>
        @endif
    </div>
@endsection
