@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col bg-white rounded">
            <div class="row border-bottom card-header">
                <div class="col-12 p-0">Liste des galeries</div>
            </div>
            <div class="row p-3">
                @foreach($galleries->sortByDesc('votes') as $gallerie)
                <div class="mx-auto my-1">
                    <div class="card galerieItem">
                        <div class="card-header">{{ $gallerie->nom_gallerie }}</div>

                        <a href="{{ route('galleries.show', $gallerie->id) }}" title="{{ $gallerie->nom_gallerie }}">
                            @if(!empty($gallerie->photos->sortByDesc('votes')->first()))
                            <img class="card-img-top" src="{{ asset($gallerie->photos->sortByDesc('votes')->first()->nom_thumb) }}" alt="{{ $gallerie->nom_gallerie }}" style="border-top-left-radius: 0; border-top-right-radius: 0;"/>
                            @else
                            Aucune photo pour cette Gallerie
                            @endif
                        </a>

                        <div class="card-body">
                            Votes : {{ $gallerie->votes }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
