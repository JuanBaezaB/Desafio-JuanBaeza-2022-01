<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('titulo');
            $table->integer('duracion');
            $table->string('lyrics');
            $table->integer('visitas');
            $table->integer('like');
            ///$table->binary('audio');
            $table->unsignedTinyInteger('album_id');
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE cancion ADD audio LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('cancion', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
        });
        Schema::dropIfExists('cancion');
    }
}
