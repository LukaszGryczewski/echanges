@extends('layouts.app')

@section('title', __('Liste des utilisateurs'))

@section('content')
    <div class="mb-3 search-container">
        <form action="{{ route('admin.user.search') }}" method="GET" class="mb-3">
            <div class="row align-items-center">
                <div class="col-sm-5">
                    <input type="text" name="query" class="form-control" placeholder="{{ __('Chercher un utilisateur') }}"
                        value="{{ request('query') }}">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="mt-2 btn btn-success">{{ __('Rechercher') }}</button>
                </div>
                <div class="col-sm-4 text-end">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success">{{ __('Ajouter Utilisateur') }}</a>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        @if ($users && $users->count())
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
                                        <!-- Bouton Bloquer et debloquer -->
                                        <form action="{{ route('admin.user.toggleBlock') }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <!-- Bouton pour ouvrir le modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#blockModal" data-userid="{{ $user->id }}"
                                                data-username="{{ $user->login }}" data-useremail="{{ $user->email }}">
                                                {{ $user->isBlocked ? __('Débloquer') : __('Bloquer') }}
                                            </button>
                                        </form>
                                        <!-- Bouton Supprimer -->
                                        <form action="{{ route('admin.user.adminDestroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer le membre? Cette action est irréversible.') }}')"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm">{{ __('Supprimer') }}</button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center alert alert-info">{{ __('La liste des utilisateurs est vide') }}</div>
        @endif
        <div class="d-flex justify-content-center custom-pagination" style="font-size: 0.8em;">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.user.toggleBlock') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="blockModalLabel">{{ __('Bloquer Utilisateur') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Bloquer') }}: <span id="username"></span> (<span id="useremail"></span>)</p>
                        <textarea class="form-control" name="block_reason" placeholder="{{ __('Raison du blocage...') }}"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-warning" id="modalConfirmButton">
                            {{ __('Confirmer le blocage') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
