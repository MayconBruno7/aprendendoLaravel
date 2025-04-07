<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [Home::class, 'index']);

Route::prefix('/home')->group(function () {
    Route::get('/', [Home::class, 'index']);
});
