@extends('layouts.card')

@section('card_title')
    Modifier un tag
@endsection

@section('card_body')
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="lib_tag" class="col-md-5 col-form-label text-md-right">Libellé du tag</label>

            <div class="col-md-6">
                <input id="lib_tag" type="text" class="form-control @error('lib_tag') is-invalid @enderror" name="lib_tag" value="{{ old('lib_tag', $tag->lib_tag) }}" required autocomplete="lib_tag" autofocus>

                @error('lib_tag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </div>
        </div>
    </form>
@endsection
