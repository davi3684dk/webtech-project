<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Game;

class GamesController extends Controller
{
    public function index() {
        return view("index");
    }

    public function create() {
        $tags = Tag::all();
        return view("create", ["tags" => $tags]);
    }

    public function store() {
        $game = new Game;
        $game -> title = request("title");
        $game -> year = request("year");
        $game -> developer = request("developer");
        $game -> publisher = request("publisher");
        $game -> description = request("description");
        $game -> price = request("price");
        $game -> cover_id = null;
        $game -> save();

        $tags = request("tag");
        foreach ($tags as $tag) {
            $game->tags()->sync($tag);
        }

        $game->save();

        return redirect()->route("index");
    }
}
