@extends('layouts.app')

@section('title', __('Liste des Produits'))

@section('content')

    <div class="mb-3 search-container">
        <form action="{{ route('product.search') }}" method="GET">
            <div class="row align-items-center">
                <div class="col-sm-5">
                    <input type="text" name="query" class="form-control" placeholder="{{ __('Chercher un produit...') }}"
                        value="{{ request('query') }}">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success">{{ __('Rechercher') }}</button>
                </div>
                <div class="col-sm-4 text-end">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success">{{ __('Ajouter Produit') }}</a>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        @if ($products && $products->count())
            <form method="POST" action="{{ route('admin.product.productsCheckDelete') }}">
                @csrf
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-title">
                            <th colspan="9">{{ __('Mes Produits') }}</th>
                        </tr>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Nom du produit') }}</th>
                            <th>{{ __('Edition') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Utilisateur') }}</th>
                            <th>{{ __('Condition') }}</th>
                            <th>{{ __('Transaction') }}</th>
                            <th>{{ __('Prix ') }}(€)</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products))
                            @foreach ($products as $product)
                                <tr>
                                    <td><input type="checkbox" name="selected_products[]" value="{{ $product->id }}"></td>
                                    <td>
                                        @if ($product->image)
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                                    class="img-thumbnail" style="max-width: 100px;">
                                            </a>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('product.show', $product->id) }}"
                                            class="product-link">{{ $product->name }}</a></td>
                                    <td>{{ $product->edition }}</td>
                                    <td>{{ $product->type->type }}</td>
                                    <td>{{ $product->user->login }}</td>
                                    <td>{{ $product->condition }}</td>
                                    <td>{{ $product->type_transaction }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="mb-1 btn btn-success btn-sm">{{ __('Modifer') }}</a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete('{{ route('admin.product.delete', $product->id) }}')">{{ __('Supprimer') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">{{ __('Aucun produit trouvé pour cet utilisateur') }}.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            @else
                <div class="text-center alert alert-info">{{ __('La liste des produits est vide') }}</div>
        @endif
        <button type="submit" class="mt-2 btn btn-danger">{{ __('Supprimer les produits sélectionnés') }}</button>
        </form>
        <div class="d-flex justify-content-center custom-pagination" style="font-size: 0.8em;">
            {{ $products->links() }}
        </div>
    </div>

@endsection
