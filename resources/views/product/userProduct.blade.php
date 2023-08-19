@extends('layouts.app')

@section('title', __('Liste des Produits'))

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('product.create') }}" class="btn btn-custom-search">{{ __('Ajouter Produit') }}</a>
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
                            <td>{{ $product->type->type }}</td>
                            <td>{{ $product->user->login }}</td>
                            <td>{{ $product->condition }}</td>
                            <td>{{ $product->type_transaction }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="mb-1 btn btn-primary btn-sm">{{ __('Modifer') }}</a>
                                @if (Auth::check() && $product->user_id === Auth::user()->id)
                                    <form method="post" action="{{ route('product.delete', $product->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">{{ __('Supprimer') }}</button>
                                    </form>
                                @endif
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
    </div>
@endsection
