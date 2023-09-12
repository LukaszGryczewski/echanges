@extends('layouts.app')

@section('title', __('Détails de l\'utilisatreur'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="mt-3 text-center"> <!-- Centrer l'image -->
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->login }}"
                            class="card-img-top img-fluid rounded-circle profile-image">
                    </div>
                    <div class="card-body">
                        <h1 class="mb-4 card-title">{{ $user->login }}</h1>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>{{ __('Prénom') }}</strong></td>
                                    <td>{{ $user->firstname }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Nom') }}</strong></td>
                                    <td>{{ $user->lastname }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Adresse') }}</strong></td>
                                    <td>{{ $user->address->street }} {{ $user->address->number }}
                                        {{ $user->address->municipalitie }} {{ $user->address->postal_code }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Mail') }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Télephone') }}</strong></td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Crée le') }}</strong></td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Modifiée le') }}</strong></td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                            <tbody>
                                @if ($user->products->count() > 0)
                                    <div class="mt-4">
                                        <table class="table table-bordered">
                                            <h2>{{ __('Produits de l\'utilisateur') }}</h2>
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Image') }}</th>
                                                    <th>{{ __('Nom') }}</th>
                                                    <th>{{ __('Description') }}</th>
                                                    <th>{{ __('Prix') }}</th>
                                                    <th>{{ __('Quantité') }}</th>
                                                    <th>{{ __('Type de Transaction') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->products as $product)
                                                    <tr>
                                                        <td>
                                                            @if ($product->image)
                                                                <img src="{{ $product->image_url }}"
                                                                    alt="{{ $product->name }}" class="img-thumbnail"
                                                                    style="max-width: 100px;">
                                                            @endif
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->price }}€</td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->type_transaction }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                        <a class="btn btn-success" href="{{ route('admin.user.index') }}">{{ __('Retour') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
