
@extends('layouts.app')

@section('title', 'Détails du Produit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="shadow card">
                @if ($product->image)
                    <img src="{{ $product->image_url  }}" alt="{{ $product->name }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h1 class="mb-4 card-title">{{ $product->name }}</h1>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Edition</strong></td>
                                <td>{{ $product->edition }}</td>
                            </tr>
                            <tr>
                                <td><strong>Type</strong></td>
                                <td>{{ $product->type->type }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Quantité</strong></td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                            <tr>
                                <td><strong>Utilisateur</strong></td>
                                <td><a href="{{ route('user.show', $product->user->id) }}">{{ $product->user->login }}</a></td>

                            </tr>
                            <tr>
                                <td><strong>Condition</strong></td>
                                <td>{{ $product->condition }}</td>
                            </tr>
                            <tr>
                                <td><strong>Transaction</strong></td>
                                <td>{{ $product->type_transaction }}</td>
                            </tr>
                            <tr>
                                <td><strong>Prix</strong></td>
                                <td>{{ $product->price }} €</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr> <!-- Ajout d'une séparation -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
