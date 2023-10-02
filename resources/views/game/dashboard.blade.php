@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1 class="my-games">Meus games cadastrados:</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-plans-container">
    @if(count($games) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de inserção</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="mygames-container">
                @foreach($games as $game)
                    <tr>
                        <td class="hash" scropt="row">{{ $loop->index + 1 }}</td>
                        <td class="game-title"><a href="/game/{{ $game->id }}">{{ $game->title }}</a></td>
                        <td class="create-date">{{ date('d/m/Y', strtotime($game->created_at)) }}</td>
                        <td class="actions">
                            <a href="/game/edit/{{ $game->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                            <form action="/game/{{ $game->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não cadastrou nenhum game, vamos cadastrar o seu primeiro game? Clique <a href="/game/create">aqui</p></a>
    @endif
</div>

@endsection