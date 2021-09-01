@extends('layouts.card')

@section('card_title')
    Ajouter une galerie
@endsection

@section('card_body')
    <form action="{{ route('galleries.store') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="nom_gallerie" class="col-md-5 col-form-label text-md-right">Nom de la galerie</label>

            <div class="col-md-6">
                <input id="nom_gallerie" type="text" class="form-control @error('nom_gallerie') is-invalid @enderror" name="nom_gallerie" value="{{ old('nom_gallerie') }}" required autocomplete="nom_gallerie" autofocus>

                @error('nom_gallerie')
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
