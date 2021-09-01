@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('img/logohome.png') }}" class="mw-100" />
                        </div>
                        <div class="col-9">
                            <p>Bienvenus dans le section consacrée aux photos d'<b>Ivary Gallery</b>. Enjoy !</p>

                            <br>
                            <a href="{{ route('galleries.index') }}" >Galeries</a>
                            <br>
                            <a href="{{ route('photos.index') }}" >Photos</a>
                            <br>
                            <a href="{{ route('tags.index') }}" >Tags</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
