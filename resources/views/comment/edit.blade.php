@extends('layouts.app')

@section('title', __('Modifier un Commentaire'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Modifier un commentaire') }}</h5>
                        <form action="{{ route('comment.update', $comment->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="comment">{{ __('Commentaire') }}</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3">{{ $comment->comment }}</textarea>
                                @error('comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="score">{{ __('Score') }}</label>
                                <select class="form-control @error('score') is-invalid @enderror" id="score"
                                    name="score">
                                    <option value="1" {{ $comment->score === '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $comment->score === '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $comment->score === '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $comment->score === '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $comment->score === '5' ? 'selected' : '' }}>5</option>
                                </select>
                                @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Modifier le commentaire') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
