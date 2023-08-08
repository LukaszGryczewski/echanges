@extends('layouts.app')

@section('description', 'Home')

@section('content')

    <div class="container d-flex justify-content-center align-items-center" >
        <video autoplay loop muted preload="auto">
            <source src="{{ asset('storage/videos/Le monde de.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>


@endsection
