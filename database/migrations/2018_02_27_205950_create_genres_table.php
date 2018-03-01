<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genre_name')->unique();
            $table->timestamps();
        });
        Schema::create('genre_to_movie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('movies')->onDelete('cascade');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('genres')->onDelete('cascade');
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
        Schema::dropIfExists('genre_to_movie');
        Schema::dropIfExists('genres');
    }
}
