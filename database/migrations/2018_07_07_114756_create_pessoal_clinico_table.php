<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoalClinicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoal_clinicos', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('name');
            $table->date('data');
            $table->string('telefone',12)->unique();
            $table->string('email')->unique();
            $table->string('codigo_postal')->unique();
            $table->string('idioma')->nullable();
            $table->string('imagem')->nullable();
            
            $table->integer('categoria_clinica_id')->unsigned();          
            $table->integer('especialidade_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
             
            
            
            $table->foreign('categoria_clinica_id')->references('id')
                     ->on('categoria_clinicas')->onDelete('cascade');
             $table->foreign('especialidade_id')->references('id')
                     ->on('especialidades')->onDelete('cascade');
             
             $table->foreign('user_id')->references('id')
                     ->on('users')->onDelete('cascade');
             
             $table->foreign('municipio_id')->references('id')
                     ->on('municipios')->onDelete('cascade');
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
        Schema::dropIfExists('pessoal_clinico');
    }
}
