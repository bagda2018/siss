<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alergico')->nullable();
            $table->enum('sexo',['mascculino','femenino']);
            $table->integer('grupo_sanguino_id')->unsigned();
            $table->integer('pessoal_clinico_id')->unsigned();
            $table->integer('utente_id')->unsigned();
            
            
             $table->foreign('grupo_sanguino_id')->references('id')
                     ->on('grupo_sanguinos')->onDelete('cascade');

                     $table->foreign('utente_id')->references('id')
                     ->on('utentes')->onDelete('cascade');
             
             $table->foreign('pessoal_clinico_id')->references('id')
                     ->on('pessoal_clinicos')->onDelete('cascade');
            
            
            
            
            
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
        Schema::dropIfExists('rcus');
    }
}
