@extends('layouts.app')

@section('description', 'Home')

@section('content')


    <div class="container d-flex justify-content-center align-items-center" >
        <video autoplay loop muted preload="auto">
            <source src="{{ asset('storage/videos/Le monde de.mp4') }}" type="video/mp4">
                {{ __('Ton navigateur ne suporte pas se format de video') }}.
        </video>
    </div>


@endsection
