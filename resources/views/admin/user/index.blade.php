@extends('layouts.app')

@section('title', __('Liste des utilisateurs'))

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('Liste des ') }} {{ $resource }}</h1>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>{{ __('Login') }}</th>
                    <th>{{ __('Prénom') }}</th>
                    <th>{{ __('Nom') }}</th>
                    @if (Auth::user() && Auth::user()->role && Auth::user()->role->role == 'admin')
                        <th>{{ __('Actions') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        @if (Auth::user() && Auth::user()->role && Auth::user()->role->role == 'admin')
                            <td>
                                <div class="gap-2 d-flex align-items-center">

                                    <!-- Bouton Détails -->
                                    <a href="{{ route('admin.user.show', $user->id) }}"
                                        class="btn btn-primary btn-sm">{{ __('Détails') }}</a>

                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('admin.user.adminDestroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer l\'utilisateur? Cette action est irréversible.') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>

                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
