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
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-title">
                    <th colspan="9">{{ __('Mes Produits') }}</th>
                </tr>
                <tr>
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
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                    class="mb-1 btn btn-success btn-sm">{{ __('Modifer') }}</a>
                                <form method="post" action="{{ route('admin.product.delete', $product->id) }}"
                                    onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cet produit? Cette action est irréversible.') }}')"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">{{ __('Supprimer') }}</button>
                                </form>
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
        <div class="d-flex justify-content-center custom-pagination" style="font-size: 0.8em;">
            {{ $products->links() }}
        </div>
    </div>
@endsection
