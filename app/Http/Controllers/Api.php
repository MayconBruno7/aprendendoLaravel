<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Api extends Controller
{
    public function cep()
    {
        return view('api/cep');
    }

    public function criaUsuario()
    {
        return view('api/criaUsuario');
    }
}
