@extends('layouts.card')

@section('card_title')
    Modifier une photo
@endsection

@section('card_body')
    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="titre_photo" class="col-md-4 col-form-label text-md-right">Titre de la photo</label>

            <div class="col-md-6">
                <input id="titre_photo" type="text" class="form-control @error('titre_photo') is-invalid @enderror" name="titre_photo" value="{{ old('titre_photo', $photo->titre_photo) }}" required autocomplete="titre_photo" autofocus>

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
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $photo->description) }}" autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="gallerie_id" class="col-md-4 col-form-label text-md-right">Gallerie</label>

            <div class="col-md-6">
                <select name="gallerie_id">
                        <option value="false"></option>
                    @foreach($galleries as $gallerie)
                        <option value="{{ $gallerie->id }}" @isset($photo->gallerie) @if($gallerie->id == $photo->gallerie->id)selected="true"@endif @endisset>{{ $gallerie->nom_gallerie }}</option>
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
                    <select name="tags[]" multiple class="form-control" size="20">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags') ?: []) ? 'selected' : '' }} @if(in_array($tag->id, $tags_id))selected="true"@endif>{{ $tag->lib_tag }}</option>
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
