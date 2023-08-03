@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')

    <ul>
        <li><a href="{{ route('product.create') }}">Ajouter Produit</a></li>
    </ul>
    <h1>Mes Produits</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom du produit</th>
                    <th>Edition</th>
                    <th>Utilisateur</th>
                    <th>Condition</th>
                    <th>Transaction</th>
                    <th>Prix (€)</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($myProducts))
                    @foreach ($myProducts as $product)
                        <tr>
                            <td>
                                @if ($product->image)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail"
                                        style="max-width: 100px;">
                                @endif
                            </td>
                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->edition }}</td>
                            <td>{{ $product->user->login }}</td>
                            <td>{{ $product->condition }}</td>
                            <td>{{ $product->type_transaction }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                @else
                    <p>Aucun produit trouvé pour cet utilisateur.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection
