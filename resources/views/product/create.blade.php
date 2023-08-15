@extends('layouts.app')

@section('description', __('Ajouter un Produit'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ajouter un produit') }}</div>

                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Nom') }}</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <input type="text" id="description" name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description') }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Prix') }}</label>
                                <input type="text" id="price" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">{{ __('Quantité') }}</label>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity') }}" required>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="edition">{{ __('Edition') }}</label>
                                <input type="text" id="edition" name="edition"
                                    class="form-control @error('edition') is-invalid @enderror"
                                    value="{{ old('edition') }}" required>
                                @error('edition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">{{ __('Type') }}</label>
                                <select name="type" id="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="condition">{{ __('Condition') }}</label>
                                <select id="condition" name="condition"
                                    class="form-control @error('condition') is-invalid @enderror">
                                    <option value="Neuf">Neuf</option>
                                    <option value="Parfait">Parfait</option>
                                    <option value="Très bon">Très bon</option>
                                    <option value="Bon">Bon</option>
                                    <option value="Moyen">Moyen</option>
                                    <option value="Mauvais">Mauvais</option>
                                    <option value="Très Mauvais">Très Mauvais</option>
                                </select>
                                @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type_transaction">{{ __('Type de transaction') }}</label>
                                <select id="type_transaction" name="type_transaction"
                                    class="form-control @error('type_transaction') is-invalid @enderror">
                                    <option value="Vente">Vente</option>
                                    <option value="Echange">Échange</option>
                                </select>
                                @error('type_transaction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                                <a href="{{ route('product.userProduct') }}"
                                    class="btn btn-secondary">{{ __('Annuler') }}</a>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h2>{{ __('Liste des erreurs de validation') }}</h2>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <nav><a href="{{ route('product.userProduct') }}">{{ __('Retour à l\'index') }}</a></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
