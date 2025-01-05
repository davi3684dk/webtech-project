<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class APIController extends Controller
{
    public function index() {
        $games = Game::with("user")->get();
        return response()->json($games);
    }
    //
}
