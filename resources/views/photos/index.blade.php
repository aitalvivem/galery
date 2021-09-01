@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Liste des photos</div>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <a class="text-secondary pl-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="deplie('h1', 's1')">
                            Filtrer
                            <svg id="h1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down ml-3" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            <svg id="s1" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up ml-3" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                            </svg>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="{{ route('photos.filtre') }}" method="POST" class="">
                                @csrf

                                <div class="form-row align-items-end">
                                    <div class=col-md-auto>
                                        <div class="form-row">
                                            <legend class="col-form-label col-md-auto ">Mode</legend>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-auto">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mode" id="mode1" value="union" @if(isset($mode)) @if($mode == 'union') checked @endif @else checked @endif>
                                                    <label class="form-check-label" for="mode1">Union</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="mode" id="mode2" value="inter" @if(isset($mode)) @if($mode == 'inter') checked @endif @endif>
                                                    <label class="form-check-label" for="mode2">Intersection</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto ml-auto">
                                        <button type="submit" class="btn btn-primary">
                                            Valider
                                        </button>
                                        <a href="{{ route('photos.index') }}" class="btn btn-secondary">
                                            Retirer tous les fltres
                                        </a>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <legend class="col-form-label col-md-auto">Tags</legend>
                                </div>
                                <div class="form-row">
                                    @foreach($tags as $tag)
                                    <div class="col-md-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ltags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" @isset($listtags)@if(in_array($tag->id, $listtags)) checked @endif @endisset >
                                            <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->lib_tag }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container mt-3">
                    <div class="row">
                    @foreach($photos as $photo)
                        <div class="mx-auto my-1 p-1" id="{{ $photo->id }}">
                            <div class="card galerieItem">
                                <div class="card-header">
                                    <a class="text-secondary" href="{{ route('photos.show', $photo->id) }}" title="Afficher">{{ $photo->titre_photo }}</a>

                                    <a class="text-secondary float-right ml-3" href="{{ route('photos.edit', $photo->id) }}" title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </div>

                                <a class="thumbnail fancybox card-img-top text-center bg-secondary" rel="ligthbox" href="{{ asset($photo->nom_file) }}" title="{{ $photo->titre_photo }}" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                    <img class="img-responsive" src="{{ asset($photo->nom_thumb) }}" alt="{{ $photo->titre_photo }}"/>
                                </a>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Votes : {{ $photo->votes }}
                                            <div class="float-right">
                                                <a href="{{ route('photos.voteIndex', [$photo, $photos->currentPage()]) }}" title="Vote" class="text-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                                        <path d="M8 6.236l-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @isset($photo->gallerie)
                                        @if($photo->gallerie->count() > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                Galerie : <a href="{{ route('galleries.show', $photo->gallerie->id) }}" class="mr-1" title="{{ $photo->gallerie->nom_gallerie }}">{{ $photo->gallerie->nom_gallerie }}</a>
                                            </div>
                                        </div>
                                        @endif
                                    @endisset
                                    @isset($photo->tags) 
                                    <div class="accordion" id="accordionExample{{ $photo->id }}">
                                        <div class="card border-0">
                                            <div class="card-header pl-0" id="heading{{ $photo->id }}">
                                                <a class="text-secondary pl-0" type="button" data-toggle="collapse" data-target="#collapse{{ $photo->id }}" aria-expanded="true" aria-controls="collapse{{ $photo->id }}" onclick="deplie('h{{ $photo->id }}', 's{{ $photo->id }}')">
                                                    Tags
                                                    <svg id="h{{ $photo->id }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down ml-3" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                    <svg id="s{{ $photo->id }}" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up ml-3" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="collapse{{ $photo->id }}" class="collapse" aria-labelledby="heading{{ $photo->id }}" data-parent="#accordionExample{{ $photo->id }}">
                                                <div class="row">
                                                    <div class="col-md-12 w-100">
                                                        @foreach($photo->tags->sortBy('lib_tag') as $t)
                                                        <a href="{{ route('tags.show', $t->id) }}" class="mr-1" title="{{ $t->lib_tag }}">#{{ $t->lib_tag }}</a></br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {{ $photos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
