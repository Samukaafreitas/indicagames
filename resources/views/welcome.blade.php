@extends('layouts.main')
@section('title', 'Indica Games')
@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um game</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="games-container" class="col-md-12">
        @if($search)
            <h1 class="search-info">Você buscou por: {{ $search }}</h1>
        @else
            <h1 class="offer-info">Veja outros games</h1>
        @endif
        <div id="cards-container" class="row">
            @foreach($games as $game)
                <div class="card col-md-3">
                    <img src="/img/games_img/{{ $game->image }}" alt="{{ $game->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="release-date">Data de Lançamento: {{ date('d/m/Y', strtotime($game->data_lancamento)) }}</p> 
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
            @if(count($games) == 0)
                <p>Poxa, não há games cadastrados até o momento, vamos cadastrar o primeiro?</p>
            @endif
        </div>
    </div>

@endsection