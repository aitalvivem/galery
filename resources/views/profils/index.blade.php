@extends('layouts.game')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Liste des profils</div>
                <div class="card-body">
                    <div class="container mt-3">
                        <div class="row">
                            @foreach($profils as $profil)
                            <div class="mx-auto my-1 p-1">
                                <div class="card">
                                    <div class="card-header">{{ $profil->nom }}</div>
                                    <div class="card-body">
                                        {{ $profil->photo }}
                                        @foreach($profil->gages as $gage)
                                            {{ $gage->rang }} - {{ $gage->lib }}<br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection