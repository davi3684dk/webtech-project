<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(
            Tag::class,
            "games_tags",
            "game_id",
            "tag_id"
        );
    }
}
