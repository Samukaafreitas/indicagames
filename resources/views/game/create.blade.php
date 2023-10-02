@extends('layouts.main')
@section('title', 'Cadastrar Sinopse Game')
@section('content')

<div id="game-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre sua sinopse de game</h1>
    <form action="/game" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Selecione uma capa para o Game</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Nome do Game:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="data_lancamento">Data de lançamento:</label>
            <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" placeholder="Data de Lançamento">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição/Sinopse do Game"></textarea>
        </div>
        <div class="form-group">
                <div>
                    <label for="platform">Plataforma:</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="pc"> PC </br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="xbox"> Xbox </br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="ps5"> PS5 </br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="ps4"> PS4 </br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="switch"> Switch </br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="platform[]" value="snes"> SNES/NES </br>
                </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Salvar Game">
    </form>
</div>

@endsection