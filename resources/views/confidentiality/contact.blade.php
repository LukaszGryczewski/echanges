@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Contact') }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('Adresse électronique') }}</strong>: info@iccbxl.be</p>
                    <p><strong>{{ __('Téléphone') }}</strong>: 02/279.58.40</p>
                    <p><strong>{{ __('Adresse') }}</strong>:
                        <address>
                            Palais du Midi<br>
                            4 Rue de la Fontaine<br>
                            1000 Bruxelles
                        </address>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
