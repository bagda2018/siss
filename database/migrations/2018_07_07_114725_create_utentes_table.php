<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentes', function (Blueprint $table) {
            $table->string('name');
            $table->date('data');
            $table->string('telefone',12);
            $table->integer('numero_EFR')->unique();
            $table->integer('numero')->unique();
            $table->integer('codigo_postal');
            $table->string('senha_permissao');
            $table->increments('id');
            $table->integer('entidade_financeira_id')->unsigned();
            $table->integer('user_id')->unsigned()->unique();
            $table->integer('municipio_id')->unsigned();
             
           
            
            

             $table->foreign('entidade_financeira_id')->references('id')
                     ->on('entidade_financeiras')->onDelete('cascade');
             
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
        Schema::dropIfExists('utentes');
    }
}
