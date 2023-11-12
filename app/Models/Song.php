<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        "song_name",
        "song_lyrics",
        "song_image",
        "song_file",
        "song_prices",
        "song_views",
        "song_likes",
        "genre_id"
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function singers()
    {
        return $this->belongsToMany(Singer::class, "singer_songs");
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
