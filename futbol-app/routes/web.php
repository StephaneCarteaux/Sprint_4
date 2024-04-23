<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/partidos', function () {
    return view('partidos');
});

Route::get('/clasificacion', function () {
    return view('clasificacion');
});
