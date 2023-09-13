@extends('layouts.app')

@section('title', __('Liste des utilisateurs'))

@section('content')
    <div class="container">
        <form action="{{ route('admin.user.search') }}" method="GET" class="mb-3">
            <input type="text" name="query" class="form-control" placeholder="{{ __('Chercher un utilisateur') }}"
                value="{{ request('query') }}">
            <button type="submit" class="mt-2 btn btn-success">{{ __('Rechercher') }}</button>
        </form>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr class="table-title">
                    <th colspan="9">{{ __('Liste des utilisateurs') }}</th>
                </tr>
                <tr>

                    <th>{{ __('Login') }}</th>
                    <th>{{ __('Mail') }}</th>
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
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        @if (Auth::user() && Auth::user()->role && Auth::user()->role->role == 'admin')
                            <td>
                                <div class="gap-2 d-flex align-items-center">
                                    <!-- Bouton Détails -->
                                    <a href="{{ route('admin.user.show', $user->id) }}"
                                        class="btn btn-success btn-sm">{{ __('Détails') }}</a>
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('admin.user.adminDestroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer le membre? Cette action est irréversible.') }}')"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Supprimer') }}</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center custom-pagination" style="font-size: 0.8em;">
            {{ $users->links() }}
        </div>
    </div>
@endsection
