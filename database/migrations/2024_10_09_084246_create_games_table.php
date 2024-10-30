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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title");
            $table->unsignedInteger("year");
            $table->string("developer");
            $table->string("publisher");
            $table->text("description");
            $table->float("price");

            $table->unsignedBigInteger("cover_id")->nullable();
            //$table->foreign("cover_id")->references("id")->on("images")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
