<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class GameController extends Controller
{
    protected $plataformas = [];

    public function __construct()
    {
        $this->plataformas = [
            'pc'=>'PC',
            'xbox'=>'XBOX',
            'ps4'=>'PS4',
            'ps5'=>'PS5',
            'switch'=>'Nintendo Switch'
        ];
    }

    public function index() {

        $search = request('search');

        if ($search) {
            $games = Game::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $games = Game::all();
        };

        return view('welcome', ['games' => $games, 'search' => $search]);
    }

    public function create() {
        return view('game.create');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required|max:100'
        ],[
            'title.required'=>'O campo título é obrigatório'
        ]);
        
        $game = new Game;

        $game->title = $request->title;
        $game->data_lancamento = $request->data_lancamento;
        $game->description = $request->description;
        $game->platform = $request->platform;

            // Image Upload
            if($request->hasFile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;
                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path('img/games_img'), $imageName);

                $game->image = $imageName;

            }

            $user = auth()->user();
            $game->user_id = $user->id;

            $game->save();

            return redirect('/')->with('msg', 'Game cadastrado com sucesso!');

    }

    public function show($id) {
    
        $game = Game::findOrFail($id);

        $gameOwner = User::where('id', $game->user_id)->first()->toArray();

        return view('game.show', ['game' => $game, 'gameOwner' => $gameOwner]);

    }

    public function ultimosAdicionados() {

        $games = Game::all();

        return view('game.ultimosadicionados', ['games' => $games]);

    }

    public function dashboard() {

        $user = auth()->user();
        $games = $user->games;

        return view('game.dashboard', ['games' => $games]);

    }

    public function destroy($id) {
        
        Game::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Game excluido com sucesso!');
    }

    public function edit($id) {

        $game = Game::findOrFail($id);
        $platformsSelecionadas = collect($game->platform)->toArray();

        return view('game.edit', [
            'game' => $game,
            'plataformas' => $this->plataformas,
            'platformsSelecionadas'=>$platformsSelecionadas
        ]);

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/games_img'), $imageName);

            $data['image'] = $imageName;

        }

        Game::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Game editado com sucesso!');

    }

}
