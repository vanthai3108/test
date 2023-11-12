<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string("song_name", 255);
            $table->text("song_lyrics");
            $table->string("song_image", 255);
            $table->string("song_file", 255);
            $table->integer("song_prices");
            $table->integer("song_views")->default(0);
            $table->integer("song_likes")->default(0);
            $table->unsignedBigInteger("genre_id");
            $table->foreign("genre_id")->references("id")->on("genres")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
