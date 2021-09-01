@extends('layouts.card')

@section('card_title')
    Ajouter une photo
@endsection

@section('card_body')
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="titre_photo" class="col-md-4 col-form-label text-md-right">Titre de la photo</label>

            <div class="col-md-6">
                <input id="titre_photo" type="text" class="form-control @error('titre_photo') is-invalid @enderror" name="titre_photo" value="{{ old('titre_photo') }}" required autocomplete="titre_photo" autofocus>

                @error('titre_photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Fichier</label>

            <div class="custom-file col-md-5 ml-3">
                <label class="custom-file-label" for="image" data-browse="Parcourir">Choisissez un fichier</label>
                
                <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror" required>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="gallerie_id" class="col-md-4 col-form-label text-md-right">Gallerie</label>

            <div class="col-md-6">
                <select name="gallerie_id">
                        <option value="false"></option>
                    @foreach($galleries as $gallerie)
                        <option value="{{ $gallerie->id }}">{{ $gallerie->nom_gallerie }}</option>
                    @endforeach
                </select>

                @error('titre_photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Tags</label>
            <div class="col-md-6">
                <div class="select is-multiple">
                    <select name="tags[]" multiple class="form-control" size="17">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags') ?: []) ? 'selected' : '' }}>{{ $tag->lib_tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </div>
        </div>
    </form>
@endsection
