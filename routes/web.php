<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\APIController;


Route::get('/api/', [APIController::class, "index"]);

Route::get('/', function () { return redirect()->route("index"); } );

Route::get('/games', [GamesController::class, "index"])->name("index");

Route::get('/user/{user}', [ProfileController::class, "get"])->name("user.profile");

Route::get('/games/create', [GamesController::class, "create"])->name("create")
-> middleware("auth");

Route::get('/games/{game}', [GamesController::class, "get"])->name("games.get");

Route::delete('/games/{game}', [GamesController::class, "delete"])->name("games.delete")
-> middleware("auth");

Route::post('/games', [GamesController::class, "store"])->name("store")
-> middleware("auth");

Route::get('/register', [RegisterController::class, "show"])->name("show-register")
-> middleware("guest");

Route::post('/register', [RegisterController::class, "store"])->name("register")
-> middleware("guest");

Route::get("/login", [LoginController::class, "show"])->name("show-login")
-> middleware("guest");

Route::post("/login", [LoginController::class, "store"])->name("login")
-> middleware("guest");

Route::post("/logout", [LoginController::class, "logout"])->name("logout")
-> middleware("auth");