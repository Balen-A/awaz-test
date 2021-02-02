<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('album_id');
            $table->string('path');
            $table->string('s3_key');
            $table->integer('liked')->default('0');
            $table->integer('plays')->default('0');

            $table->timestamps();


            $table->foreign('artist_id')
            ->references('id')
            ->on('artists')
            ->onDelete('cascade');

            $table->foreign('genre_id')
            ->references('id')
            ->on('genre')
            ->onDelete('cascade');

            $table->foreign('album_id')
            ->references('id')
            ->on('albums')
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
        Schema::dropIfExists('songs');
    }
}
