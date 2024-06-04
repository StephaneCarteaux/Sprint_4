<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
require __DIR__.'/auth.php';

// returns the home page with all posts
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'verified'])->group(function () {
    // league
    Route::resource('/leagues', LeagueController::class, ['except' => ['show']]);
    Route::patch('/leagues/{league}/activate', [LeagueController::class, 'activate'])->name('leagues.activate');
    Route::patch('/leagues/{league}/start', [LeagueController::class, 'start'])->name('leagues.start');
    // team
    Route::resource('/teams', TeamController::class, ['except' => ['show']]);
    // game
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');
    
});

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');
Route::patch('/leagues/{league}/dropdown', [LeagueController::class, 'dropdown'])->name('leagues.dropdown');
Route::get('/locale', LocaleController::class)->name('locale.change');

Route::fallback(function () {
    return view('errors.404');
});
