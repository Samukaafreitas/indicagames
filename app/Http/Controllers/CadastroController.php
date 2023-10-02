<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function cadastro() {
        return view('cadastro.cadastro');
    }

    public function login() {
        return view('cadastro.login');
    }
}
