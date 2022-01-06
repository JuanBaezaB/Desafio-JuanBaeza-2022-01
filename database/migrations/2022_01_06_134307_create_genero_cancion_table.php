<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneroCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_cancion', function (Blueprint $table) {
            $table->unsignedTinyInteger('cancion_id');
            $table->foreign('cancion_id')->references('id')->on('cancion')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('genero')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(array('cancion_id', 'genero_id'));
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('genero_cancion', function (Blueprint $table) {
            $table->dropForeign(['cancion_id']);
            $table->dropForeign(['genero_id']);
        });
        Schema::dropIfExists('genero_cancion');
    }
}
