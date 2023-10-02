<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CadastroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GameController::class, 'index']);
Route::get('/game/create', [GameController::class, 'create'])->middleware('auth');;
Route::get('/game/ultimosadicionados', [GameController::class, 'ultimosAdicionados']);
Route::get('/game/{id}', [GameController::class, 'show']);
Route::post('/game', [GameController::class, 'store']);

// Rota de Delete
Route::delete('/game/{id}', [GameController::class, 'destroy'])->middleware('auth');

//Rota de Edit
Route::get('/game/edit/{id}', [GameController::class, 'edit'])->middleware('auth');
Route::put('/game/update/{id}', [GameController::class, 'update'])->middleware('auth');


Route::get('/cadastro/contato', [CadastroController::class, 'contato']);

Route::get('/dashboard', [GameController::class, 'dashboard'])->middleware('auth');


