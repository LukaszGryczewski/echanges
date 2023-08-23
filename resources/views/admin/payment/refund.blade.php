@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-center card-header">{{ __('Remboursement') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.payment.refund') }}" method="post">
                            @csrf

                            <!-- Liste des commandes -->
                            <div class="form-group">
                                <label for="order-select">{{ __('Commande') }}:</label>
                                <select class="form-control" id="order-select" name="order_id">
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">{{ __('Commande') }} #{{ $order->id }} -
                                            {{ $order->total_price }} €</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Montant du remboursement -->
                            <div class="form-group">
                                <label for="refund-amount">{{ __('Montant à rembourser') }}: €</label>
                                <input type="number" class="form-control" id="refund-amount" name="refund_amount"
                                    step="0.01" min="0">
                            </div>

                            <!-- Raison du remboursement -->
                            <div class="form-group">
                                <label for="refund-reason">{{ __('Raison du remboursement') }} :</label>
                                <textarea class="form-control" id="refund-reason" name="refund_reason" rows="3"></textarea>
                            </div>

                            <!-- Bouton de remboursement -->
                            <div class="text-center form-group">
                                <button type="submit"
                                    class="btn btn-danger">{{ __('Effectuer le remboursement') }}</button>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
