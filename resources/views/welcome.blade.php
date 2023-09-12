@extends('layouts.app')

@section('description', 'Home')

@section('content')


    <div class="container d-flex justify-content-center align-items-center" >
        <video autoplay loop muted preload="auto">
            <source src="{{ asset('storage/videos/logo.mp4') }}" type="video/mp4">
                {{ __('Ton navigateur ne suporte pas se format de video') }}.
        </video>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


@endsection
