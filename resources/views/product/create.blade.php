@extends('layouts.app')

@section('description', 'Ajouter un Produit')

@section('content')
    <h2>Ajouter un produit</h2>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name"
                @if (old('name')) value="{{ old('name') }}" @endif
                class="@error('name') is-invalid @enderror">

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description"
                @if (old('description')) value="{{ old('description') }}" @endif
                class="@error('description') is-invalid @enderror">

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="price">Prix</label>
            <input type="text" id="price" name="price"
                @if (old('price')) value="{{ old('price') }}" @endif
                class="@error('price') is-invalid @enderror">

            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="quantity">Quantité</label>
            <input type="text" id="quantity" name="quantity"
                @if (old('quantity')) value="{{ old('quantity') }}" @endif
                class="@error('quantity') is-invalid @enderror">

            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="edition">Edition</label>
            <input type="text" id="edition" name="edition"
                @if (old('edition')) value="{{ old('edition') }}" @endif
                class="@error('edition') is-invalid @enderror">

            @error('edition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <label for="types">Type</label>
        <select name="type" id="type">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
        </select>
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div>
            <label for="condition">Condition</label>
            <input type="text" id="condition" name="condition"
                @if (old('condition')) value="{{ old('condition') }}" @endif
                class="@error('condition') is-invalid @enderror">

            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">

            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="type_transaction">Type de transaction</label>
            <input type="text" id="type_transaction" name="type_transaction"
                @if (old('type_transaction')) value="{{ old('type_transaction') }}" @endif
                class="@error('type_transaction') is-invalid @enderror">

            @error('type_transaction')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button>Ajouter</button>
        <a href="{{ route('product.userProduct') }}">Annuler</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <h2>Liste des erreurs de validation</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav><a href="{{ route('product.userProduct') }}">Retour à l'index</a></nav>

@endsection
