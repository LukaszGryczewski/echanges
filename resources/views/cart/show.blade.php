@extends('layouts.app')

@section('description', __('Panier'))

@section('content')
    <div class="container">
        <h1 class="my-5 text-center">{{ __('Votre panier') }}</h1>
        @if ($cart && $cart->products->count())
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Nom du produit') }}</th>
                        <th>{{ __('Prix') }}</th>
                        <th>{{ __('Quantité') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->unit_price * $product->pivot->quantity }} €</td>
                            <td>
                                <form action="{{ route('cart.updateProduct', $product->id) }}" method="POST">
                                    @csrf
                                    <select class="form-select" name="quantity" onchange="this.form.submit()">
                                        @for ($i = 1; $i <= min($product->quantity, 10); $i++)
                                            <option value="{{ $i }}"
                                                {{ $product->pivot->quantity == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('cart.removeProduct', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <strong>{{ __('Prix total: ') }}{{ $totalPrice }} €</strong>
                            <div class="gap-3 mt-3 d-flex justify-content-start align-items-center">
                                <form action="{{ route('order.confirm') }}" method="GET">
                                    <button type="submit" class="btn btn-warning">{{ __('Valider le panier') }}</button>
                                </form>
                                <a class="btn btn-success"
                                    href="{{ route('product.index') }}">{{ __('Continuer mes achats') }}
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="text-center alert alert-info">{{ __('Votre panier est vide') }}</div>
        @endif
    </div>
@endsection
