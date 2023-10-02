@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1 class="my-games">Meus games cadastrados:</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-games-container">
    @if(count($game) > 0)
        <h1>Seus games são:</h1>
    @else
        <p>Você ainda não cadastrou nenhum game, vamos cadastrar o seu primeiro game? Clique </p><a href="/game/create">aqui</a>
    @endif
</div>

@endsection