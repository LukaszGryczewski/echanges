@extends('layouts.app')

@section('title', 'Détails de l\'utilisatreur')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="shadow card">
                @if ($user->image)
                    <img src="{{ $user->image }}" alt="{{ $user->login }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h1 class="mb-4 card-title">{{ $user->login }}</h1>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Prénom</strong></td>
                                <td>{{ $user->firstname }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nom</strong></td>
                                <td>{{ $user->lastname }}</td>
                            </tr>
                            <tr>
                                <td><strong>Adresse</strong></td>
                                <td>{{ $user->address->street }} {{ $user->address->number }} {{ $user->address->municipalitie }} {{ $user->address->postal_code }}</td>
                            </tr>
                            <tr>
                                <td><strong>Mail</strong></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Télephone</strong></td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>Crée le</strong></td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>Modifiée le</strong></td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <hr> <!-- Ajout d'une séparation -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
