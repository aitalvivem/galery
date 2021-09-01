@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col bg-white rounded">
            <div class="row border-bottom card-header">
                <div class="col-12 p-0">Liste des tags</div>
            </div>
            <div class="row p-3">
                @foreach($tags->sortBy('lib_tag') as $tag)
                <div class="mx-auto my-1">
                    <div class="card galerieItem">
                        <div class="card-header">{{ $tag->lib_tag }}</div>

                        <a href="{{ route('tags.show', $tag->id) }}" title="{{ $tag->lib_tag }}">
                            @if(!empty($tag->photos->sortByDesc('votes')->first()))
                            <img class="card-img-top rounded-bottom" src="{{ asset($tag->photos->sortByDesc('votes')->first()->nom_thumb) }}" alt="{{ $tag->lib_tag }}" style="border-top-left-radius: 0; border-top-right-radius: 0;"/>
                            @else
                            Aucune photo pour ce tag
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
