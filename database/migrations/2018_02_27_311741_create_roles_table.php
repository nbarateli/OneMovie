<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('role_name', ['Actor', 'Director', 'Crew']);
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->integer('cast_id')->unsigned();
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');
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
        Schema::dropIfExists('roles');
    }
}
