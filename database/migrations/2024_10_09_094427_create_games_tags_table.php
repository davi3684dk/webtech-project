<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('game_id');
            //$table->foreign('game_id')
            //      ->references('id')
            //      ->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            //$table->foreign('tag_id')
            //      ->references('id')
            //      ->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_tags');
    }
};
