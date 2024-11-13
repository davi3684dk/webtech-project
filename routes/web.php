<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', [GamesController::class, "index"])->name("index");

Route::get('/create', [GamesController::class, "create"])->name("create")
-> middleware("auth");

Route::post('/', [GamesController::class, "store"])->name("store")
-> middleware("auth");

Route::get('/register', [RegisterController::class, "show"])->name("show-register")
-> middleware("guest");

Route::post('/register', [RegisterController::class, "store"])->name("register");

Route::get("/login", [LoginController::class, "show"])->name("show-login")
-> middleware("guest");

Route::post("/login", [LoginController::class, "store"])->name("login");

Route::post("/logout", [LoginController::class, "logout"])->name("logout")
-> middleware("auth");