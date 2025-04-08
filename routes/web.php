<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home;
use App\Http\Controllers\Api;

Route::get('/', function () {
    return view('home/home');
});

// Route::get('/home', [Home::class, 'index']);

Route::prefix('/home')->group(function () {
    Route::get('/', [Home::class, 'index']);
});

Route::prefix('api')->group(function() {
    Route::get('/cep', [Api::class, 'cep']);
    Route::get('/criaUsuario', [Api::class, 'criaUsuario']);
});
