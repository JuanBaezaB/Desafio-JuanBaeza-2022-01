<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('titulo');
            $table->integer('ano_lanzamiento');
            $table->string('duracion');
            $table->longtext('imagen');
            $table->unsignedTinyInteger('artista_id');
            $table->foreign('artista_id')->references('id')->on('artista')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down() {

        Schema::table('album', function (Blueprint $table) {
            $table->dropForeign(['artista_id']);
        });

        Schema::dropIfExists('album');
    }
}
