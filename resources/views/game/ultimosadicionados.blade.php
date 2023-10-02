@extends('layouts.main')
@section('title', 'Indica Games')
@section('content')

    <div id="games-container" class="col-md-12">
        <h2 class="lastadd-info">Ultimos Adicionados:</h2>
        <div id="cards-container" class="row">
            @foreach($games as $game)
                <div class="card col-md-3">
                    <img src="/img/games_img/{{ $game->image }}" alt="{{ $game->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>    
                        <p class="platform"><span class="bi bi-controller"></span> Plataformas: </p>
                            <ul id="platforms-list-welcome">
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
                                        <li class="switch"><span id="icon" class="bi bi-nintendo-switch"></span> <span class="platform-text">{{ $platform }}</span></li>
                                    @elseif($platform == "snes")
                                        <li><span id="icon" class="bi bi-joystick"></span> <span class="platform-text">{{ $platform }}</span></li>
                                    @else
                                        @continue
                                    @endif
                                @endforeach
                            </ul>
                        <a href="/game/{{ $game->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection