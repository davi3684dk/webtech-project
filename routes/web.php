<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', [GamesController::class, "index"])->name("index");

Route::get('/create', [GamesController::class, "create"])->name("create");

Route::post('/', [GamesController::class, "store"])->name("store");