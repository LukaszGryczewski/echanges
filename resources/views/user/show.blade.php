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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
