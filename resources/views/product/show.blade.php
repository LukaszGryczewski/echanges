@extends('layouts.app')

@section('title', __('Détails du Produit'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    @if ($product->image)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product_image card-img-top">
                    @endif
                    <div class="card-body">
                        <h1 class="mb-4 card-title">{{ $product->name }}</h1>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>{{ __('Edition') }}</strong></td>
                                    <td>{{ $product->edition }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Type') }}</strong></td>
                                    <td>{{ $product->type->type }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Description') }}</strong></td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Quantité') }}</strong></td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Condition') }}</strong></td>
                                    <td>{{ $product->condition }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Transaction') }}</strong></td>
                                    <td>{{ $product->type_transaction }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Prix') }}</strong></td>
                                    <td>{{ $product->price }} €</td>
                                </tr>
                                <td>
                                    <form action="{{ route('cart.addProduct', $product->id) }}" method="POST">
                                        @csrf
                                        <label for="quantity">{{ __('Quantité :') }}</label>
                                        @if ($maxQuantity == 0)
                                            <input type="number" name="quantity" id="quantity" min="0" max="0"
                                                value="0" disabled>
                                            <span>{{ __('Produit épuisé') }}</span>
                                        @else
                                            <input type="number" name="quantity" id="quantity" min="1"
                                                max="{{ $maxQuantity }}" value="1"
                                                oninvalid="this.setCustomValidity('Le stock de ce produit est de {{ $maxQuantity }}. Veuillez introduire un chiffre inférieur ou égal à {{ $maxQuantity }}.')"
                                                onchange="this.setCustomValidity('')">
                                            <button type="submit"
                                                class="btn btn-warning">{{ __('Ajouter au panier') }}</button>
                                        @endif
                                    </form>
                                </td>
                            </tbody>
                        </table>
                        <h3>{{ __('Commentaires') }}</h3>
                        <ul class="list-group">
                            @foreach ($product->comments as $comment)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="font-weight-bold"><a
                                                    href="{{ route('user.show', $comment->user->id) }}">{{ $comment->user->login }}</a>:</span>
                                            {{ $comment->comment }}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3 text-muted">
                                                {{ $comment->score }} / 5
                                                <small class="d-block">{{ $comment->created_at }}</small>
                                            </div>
                                            @if (Auth::check() && Auth::user()->id === $comment->user_id)
                                                <a href="{{ route('comment.edit', $comment->id) }}"
                                                    class="mr-1 btn btn-sm btn-success">{{ __('Modifier') }}</a>
                                                <form method="post" action="{{ route('comment.delete', $comment->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <button class="btn btn-sm btn-danger">{{ __('Supprimer') }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>





                        <div class="card">
                            <div class="card-body">
                                @if (Auth::check())
                                    <button id="show-comments"
                                        class="btn btn-success">{{ __('Ajouter un commentaire') }}</button>
                                    <div id="comments-section" style="display: none;">
                                        <h5 class="card-title">{{ __('Ajouter un commentaire') }}</h5>
                                        <form action="{{ route('comment.store', ['product_id' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="form-group">
                                                <label for="comment">{{ __('Commentaire') }}</label>
                                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"></textarea>
                                                @error('comment')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="score">Score</label>
                                                <select class="form-control @error('score') is-invalid @enderror"
                                                    id="score" name="score">
                                                    <option value="" disabled selected>
                                                        {{ __('Choisissez une note') }}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                @error('score')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="btn btn-success">{{ __('Ajouter le commentaire') }}</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
