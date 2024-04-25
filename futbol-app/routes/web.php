<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\RankingController;


// returns the home page with all posts
Route::get('/', HomeController::class .'@index')->name('home.index');

Route::resource('teams', TeamController::class);
Route::resource('games', GameController::class);
Route::resource('leagues', LeagueController::class);
Route::resource('ranking', RankingController::class);

