<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion_artista', function (Blueprint $table) {
            $table->unsignedTinyInteger('cancion_id');
            $table->foreign('cancion_id')->references('id')->on('cancion')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('artista_id');
            $table->foreign('artista_id')->references('id')->on('artista')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(array('cancion_id','artista_id'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('cancion_artista', function (Blueprint $table) {
            $table->dropForeign(['cancion_id']);
            $table->dropForeign(['artista_id']);
        });
        Schema::dropIfExists('cancion_artista');
    }
}
