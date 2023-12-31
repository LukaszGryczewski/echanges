@extends('layouts.app')

@section('quantity', __('Modifier un produit'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier un produit') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Nom') }}</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $product->name) }}" required autofocus>
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
                                    value="{{ old('description', $product->description) }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Prix') }}</label>
                                <input type="text" id="price" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">{{ __('Quantitée') }}</label>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity', $product->quantity) }}" required>
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
                                    value="{{ old('edition', $product->edition) }}" required>
                                @error('edition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="weight">{{ __('Poids') }}</label>
                                <input type="text" id="weight" name="weight"
                                    class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight', $product->weight) }}" required>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type_id">{{ __('Type de produit') }}</label>
                                <input type="text" id="type_id" name="type_id"
                                    class="form-control @error('type_id') is-invalid @enderror"
                                    value="{{ old('type_id', $product->type_id) }}" required>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="condition">{{ __('Condition') }}</label>
                                <select id="condition" name="condition"
                                    class="form-control @error('condition') is-invalid @enderror">
                                    <option value="Neuf" {{ $product->condition === 'Neuf emballage d\'origine' ? 'selected' : '' }}>
                                        {{ __('Neuf emballage d\'origine') }}
                                    </option>
                                    <option value="Parfait" {{ $product->condition === 'Parfait' ? 'selected' : '' }}>
                                        {{ __('Parfait') }}</option>
                                    <option value="Bon" {{ $product->condition === 'Bon' ? 'selected' : '' }}>
                                        {{ __('Bon') }}
                                    </option>
                                    <option value="Moyen" {{ $product->condition === 'Moyen' ? 'selected' : '' }}>
                                        {{ __('Moyen') }}
                                    </option>
                                    <option value="Mauvais" {{ $product->condition === 'Mauvais' ? 'selected' : '' }}>
                                        {{ __('Mauvais') }}</option>
                                    </option>
                                </select>
                                @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if ($product->image)
                                <div class="mb-3">
                                    <label>{{ __('Image actuelle') }}</label>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        width="200" class="img-thumbnail">
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ __('Modifier') }}</button>
                                <a href="{{ route('admin.product.index', $product->id) }}"
                                    class="btn btn-danger">{{ __('Annuler') }}</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
