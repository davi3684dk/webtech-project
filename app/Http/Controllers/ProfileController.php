<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function get(User $user) {
        $games = $user->games()->get();
        return view("profile", ["games" => $games, "profile" => $user]);
    }
}
