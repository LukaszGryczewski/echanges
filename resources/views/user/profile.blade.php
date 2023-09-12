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
                        </table>
                        <div class="d-flex align-items-center">
                        <a class="mr-1 btn btn-sm btn-success"
                            href="{{ route('user.edit', ['id' => Auth::user()->id]) }}">{{ __('Modifier le profil') }}</a>
                        <form action="{{ route('user.destroy', auth()->user()->id) }}" method="POST"
                            onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible.') }}'" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Supprimer mon compte') }}</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
