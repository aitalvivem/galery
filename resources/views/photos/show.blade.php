@extends('layouts.card')

@section('card_title')
    {{ $photo->titre_photo }}
@endsection

@section('route_edit')
    {{ route('photos.edit', $photo->id) }}
@endsection

@section('card_img')
    <img class="card-img-top" style="max-height: 65vh;" src="{{ asset($photo->nom_file) }}" alt="{{ $photo->titre_photo }}">
@endsection

@section('card_body')
    <div class="row">
        <div class="col-md-6">

        @if($photo->gallerie)
            <p>Gallerie : <a href="{{ route('galleries.show', $photo->gallerie->id) }}">{{ $photo->gallerie->nom_gallerie }}</a></p>
        @endif
        </div>
        <div class="col-md-6">
            Votes : {{ $photo->votes }}
            <div class="float-right">
                <a href="{{ route('photos.vote', $photo) }}" title="Vote" class="text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                        <path d="M8 6.236l-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    @if($photo->tags)
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
    @endif
@endsection