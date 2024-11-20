<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Game;
use App\Models\User;

class GamesController extends Controller
{
    public function index() {
        $games = Game::all();
        return view("index", ["games" => $games]);
    }

    public function create() {
        $tags = Tag::all();
        return view("create", ["tags" => $tags]);
    }

    public function delete(Game $game) {
        $game->delete();

        return redirect()->back();
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            "title" => "required|max:128",
            "year" => "required",
            "developer" => "required",
            "publisher" => "required",
        ]);

        $game = new Game;
        $game -> title = request("title");
        $game -> year = request("year");
        $game -> developer = request("developer");
        $game -> publisher = request("publisher");
        $game -> description = request("description");
        $game -> price = request("price");
        $game -> cover_id = null;
        $game -> user_id = $request->user()->id;
        $game -> save();

        $tags = request("tag");
        foreach ($tags as $tag) {
            $game->tags()->sync($tag);
        }

        $game->save();

        return redirect()->route("index");
    }
}
