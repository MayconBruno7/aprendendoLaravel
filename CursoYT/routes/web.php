<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home;
use App\Http\Controllers\Api;

Route::get('/', function () {
    return redirect()->route('admin.clientes');
});

// Route::get('/home', [Home::class, 'index']);

Route::prefix('/home')->group(function () {
    Route::get('/', [Home::class, 'index']);
});

Route::prefix('api')->group(function () {
    Route::get('/cep', [Api::class, 'cep']);
    Route::get('/criaUsuario', [Api::class, 'criaUsuario']);
});

Route::any('/any', function () {
    return "Permite todo o tipo de acesso http";
});

Route::match(['get', 'post'], '/match', function () {
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{categoria?}', function ($id, $categoria = '') {
    return "O id do produto é: " . $id . ", e a categoria é: " . $categoria;
});

Route::redirect('/sobre', 'empresa');
Route::view('empresa', 'site/empresa');

Route::get('/news', function () {
    return view('news');
})->name('noticias');

Route::get('novidades', function () {
    return redirect()->route('noticias');
});

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.'
], function () {
    Route::get('dashboard', function () {
        return 'dashboard';
    })->name('dashboard');

    Route::get('users', function () {
        return 'users';
    })->name('users');

    Route::get('clientes', function () {
        return 'clientes';
    })->name('clientes');;
});
