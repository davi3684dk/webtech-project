<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreign("cover_id")->references("id")->on("images")->onDelete("cascade");
        });

        Schema::table("games_tags", function (Blueprint $table) {
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')->onDelete('cascade');

            $table->foreign('game_id')
                ->references('id')
                ->on('games')->onDelete('cascade');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreign("game_id")->nullable()->constrained()
                ->references("id")
                ->on("games")->onDelete("cascade");
        });


        $tags = ["RPG", "Rythm", "FPS", "Action", "Puzzle"];
        foreach ($tags as $tag) {
            $t = new Tag;
            $t->name=$tag;
            $t->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
};
