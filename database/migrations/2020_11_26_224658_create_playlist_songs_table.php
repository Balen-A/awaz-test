<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('song_id');
            $table->unsignedBigInteger('playlist_id');
            $table->integer('nSongs')->default('0');
            $table->timestamps();

            $table->foreign('song_id')
            ->references('id')
            ->on('songs')
            ->onDelete('cascade');

            $table->foreign('playlist_id')
            ->references('id')
            ->on('playlist')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_songs');
    }
}
