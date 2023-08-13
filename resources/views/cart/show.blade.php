@extends('layouts.app')

@section('content')
    <h1>Votre panier</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($cart && $cart->products->count())
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->unit_price * $product->pivot->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.updateProduct', $product->id) }}" method="POST">
                                @csrf
                                <select name="quantity" onchange="this.form.submit()">

                                    @for ($i = 1; $i <= min($product->quantity, 10); $i++)
                                        <option value="{{ $i }}"
                                            {{ $product->pivot->quantity == $i ? 'selected' : '' }}>{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('cart.removeProduct', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                        <p>Prix total: {{ $totalPrice }} €</p>
                        <form action="{{ route('order.confirm') }}" method="GET">
                            <button type="submit" class="btn btn-success">Valider le panier</button>
                        </form>
                    </td>
                </tr>
            @else
                <p>Votre panier est vide.</p>
            @endif
        </tbody>
    </table>
@endsection
