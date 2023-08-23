@extends('layouts.app')

@section('title', __('Liste des Produits'))

@section('content')
    <div class="mb-3 search-container">
        <form action="{{ route('product.search') }}" method="GET">
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" name="query" class="form-control " placeholder="{{ __('Chercher un produit...') }}"
                        value="{{ request('query') }}">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success">{{ __('Rechercher') }}</button>
                </div>
                <div class="col-sm-4">
                    <!-- Bouton pour ouvrir le modal de recherche -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#searchModal">
                        {{ __('Recherche avancée') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal de recherche -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">{{ __('Recherche avancée') }}</h5>
                    <button type="button" class="btn-close btn-success" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.search') }}" method="GET">
                        <input type="text" name="query" placeholder="{{ __('Rechercher') }}..."
                            class="mb-2 form-control">

                        <!-- Éditions -->
                        <select name="edition" class="mb-2 form-control">
                            <option value="">{{ __('Sélectionner une édition') }}</option>
                            @isset($editions)
                                @foreach ($editions as $edition)
                                    <option value="{{ $edition }}">{{ $edition }}</option>
                                @endforeach
                            @endisset
                        </select>

                        <!-- Conditions -->
                        <select name="condition" class="mb-2 form-control">
                            <option value="">{{ __('Sélectionner une condition') }}</option>
                            @isset($conditions)
                                @foreach ($conditions as $condition)
                                    <option value="{{ $condition }}">{{ $condition }}</option>
                                @endforeach
                            @endisset
                        </select>

                        <!-- Types de produits -->
                        <select name="type_id" class="mb-2 form-control">
                            <option value="">{{ __('Sélectionner un type de produit') }}</option>
                            @foreach (App\Models\Type::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>

                        <!-- Tri par prix -->
                        <select name="price_order" class="mb-2 form-control">
                            <option value="">{{ __('Trier par prix') }}</option>
                            <option value="priceAsc">{{ __('Croissant') }}</option>
                            <option value="priceDesc">{{ __('Décroissant') }}</option>
                        </select>

                        <button type="submit" class="mx-auto btn btn-success d-block">{{ __('Rechercher') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-title">
                    <th colspan="9">{{ __('Liste des :resource produits') }}</th>
                </tr>
                <tr>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Nom du produit') }}</th>
                    <th>{{ __('Edition') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Condition') }}</th>
                    <th>{{ __('Transaction') }}</th>
                    <th>{{ __('Prix (€)') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @if ($product->image)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail"
                                    style="max-width: 100px;">
                            @endif
                        </td>
                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->edition }}</td>
                        <td>{{ $product->type->type }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->type_transaction }}</td>
                        <td>{{ $product->price }}</td>

                        <td>
                            <form action="{{ route('cart.addProduct', $product->id) }}" method="POST">
                                @csrf
                                <label for="quantity">{{ __('Quantité :') }}</label>
                                @if ($maxQuantities[$product->id] == 0)
                                    <input type="number" name="quantity" id="quantity" min="0" max="0"
                                        value="0" disabled>
                                    <span>{{ __('Produit épuisé') }}</span>
                                @else
                                    <input type="number" name="quantity" id="quantity" min="1"
                                        max="{{ $maxQuantities[$product->id] }}" value="1">
                                    <button type="submit" class="btn btn-warning">{{ __('Ajouter au panier') }}</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center custom-pagination" style="font-size: 0.8em;">
            {{ $products->links() }}
        </div>
    @endsection
