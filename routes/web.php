<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/layanan', function () {
    return view('layanan');
});
Route::get('/form', function () {
    return view('form');
});
