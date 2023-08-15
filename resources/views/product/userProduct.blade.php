@extends('layouts.app')

@section('title', __('Liste des Produits') )

@section('content')

    <ul>
        <li><a href="{{ route('product.create') }}">{{ __('Ajouter Produit') }}</a></li>
    </ul>
    <h1>{{ __('Mes Produits') }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Nom du produit') }}</th>
                    <th>{{ __('Edition') }}</th>
                    <th>{{ __('Utilisateur') }}</th>
                    <th>{{ __('Condition') }}</th>
                    <th>{{ __('Transaction') }}</th>
                    <th>{{ __('Prix ') }}(€)</th>
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
                            <td>
                                <div><a href="{{ route('product.edit', $product->id) }}">{{ __('Modifer') }}</a></div>
                                @if (Auth::check() && $product->user_id === Auth::user()->id)
                                    <form method="post" action="{{ route('product.delete', $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="method" value="DELETE">
                                        <button>{{ __('Supprimer') }}</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>{{ __('Aucun produit trouvé pour cet utilisateur') }}.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection
