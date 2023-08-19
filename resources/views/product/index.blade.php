@extends('layouts.app')

@section('title', __('Liste des Produits'))

@section('content')
    <h1>{{ __('Liste des :resource', ['resource' => $resource]) }}</h1>
    <form action="{{ route('product.search') }}" method="GET" class="mb-3">
        <input type="text" name="query" class="form-control" placeholder="{{ __('Chercher un produit...') }}"
            value="{{ request('query') }}">
        <button type="submit" class="mt-2 btn btn-primary">{{ __('Rechercher') }}</button>
    </form>
    <!-- Bouton pour ouvrir le modal de recherche -->
    <button type="button" class="mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
        Recherche avancée
    </button>

    <!-- Modal de recherche -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Recherche avancée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.search') }}" method="GET">
                        <input type="text" name="query" placeholder="Rechercher..." class="mb-2 form-control">

                        <!-- Éditions -->
                        <!-- Éditions -->
                        <select name="edition" class="mb-2 form-control">
                            <option value="">Sélectionner une édition</option>
                            @isset($editions)
                                @foreach ($editions as $edition)
                                    <option value="{{ $edition }}">{{ $edition }}</option>
                                @endforeach
                            @endisset
                        </select>

                        <!-- Conditions -->
                        <select name="condition" class="mb-2 form-control">
                            <option value="">Sélectionner une condition</option>
                            @isset($conditions)
                                @foreach ($conditions as $condition)
                                    <option value="{{ $condition }}">{{ $condition }}</option>
                                @endforeach
                            @endisset
                        </select>


                        <!-- Types de produits -->
                        <select name="type_id" class="mb-2 form-control">
                            <option value="">Sélectionner un type de produit</option>
                            @foreach (App\Models\Type::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>

                        <!-- Tri par prix -->
                        <select name="price_order" class="mb-2 form-control">
                            <option value="">Trier par prix</option>
                            <option value="priceAsc">Croissant</option>
                            <option value="priceDesc">Décroissant</option>
                        </select>

                        <!-- Utilisateurs ayant au moins un produit -->
                        <select name="user_id" class="mb-2 form-control">
                            <option value="">Sélectionner un utilisateur</option>
                            @foreach (App\Models\User::has('products', '>', 0)->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->login }}</option>
                            @endforeach
                        </select>

                        <!-- Ajoutez d'autres critères comme vous le souhaitez -->

                        <button type="submit" class="mt-2 btn btn-primary">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Nom du produit') }}</th>
                    <th>{{ __('Edition') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Utilisateur') }}</th>
                    <th>{{ __('Condition') }}</th>
                    <th>{{ __('Transaction') }}</th>
                    <th>{{ __('Prix (€)') }}</th>
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
                        <td>{{ $product->user->login }}</td>
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
                                    <button type="submit">{{ __('Ajouter au panier') }}</button>
                                @endif
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
