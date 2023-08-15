@extends('layouts.app')

@section('title', __('Liste des utilisateurs'))

@section('content')
    <h1>{{ __('Liste des ') }} {{ $resource }}</h1>

    <table>
        <thead>
            <tr>
                <th>{{ __('Prénom') }}</th>
                <th>{{ __('Nom') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->firstname }}</td>
                <td>
                    <a href="{{ route('user.show', $user->id) }}">{{ $user->lastname }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
