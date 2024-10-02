<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index() {
        return view("index");
    }

    public function create() {
        $tags = ["Horror", "RPG", "Rythm", "Shooter", "MMO", "CO-OP"];
        return view("create", ["tags" => $tags]);
    }

    public function store() {
        $tags = request("tag");
        return redirect()->route("index");
    }
}
