@extends('layouts.main')
@section('title', $game->title)
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/games_img/{{ $game->image }}" class="img-fluid" alt="{{ $game->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $game->title }}</h1>
                <p class="release-date">Data de Lançamento: {{ date('d/m/Y', strtotime($game->data_lancamento)) }}</p> 
                <p class="owner">Criado por: <strong class="user-owner">{{ $gameOwner['name'] }}</strong>@auth - Em: <strong class="date-create">{{ date('d/m/Y', strtotime($game->created_at)) }}</strong>@endauth
                </p></br>
                <p class="platform"><span class="bi bi-controller"></span> Plataformas: </p>
                        <ul id="platforms-list">
                            @foreach($game->platform as $platform)
                                @if($platform == "pc")
                                    <li><span id="icon" class="bi bi-windows"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @elseif($platform == "xbox")
                                    <li><span id="icon" class="bi bi-xbox"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @elseif($platform == "ps5")
                                    <li><span id="icon" class="bi bi-playstation"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @elseif($platform == "ps4")
                                    <li><span id="icon" class="bi bi-playstation"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @elseif($platform == "switch")
                                    <li><span id="icon" class="bi bi-nintendo-switch"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @elseif($platform == "snes")
                                    <li><span id="icon" class="bi bi-joystick"></span> <span class="platform-text">{{ $platform }}</span></li>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </ul>
                         
                <h3>Descrição/Sinopse:</h3>
                <p class="game-description">{{ $game->description }}</p>
            </div>
        </div>
    </div>

@endsection