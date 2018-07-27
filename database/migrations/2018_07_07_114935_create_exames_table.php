<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->increments('id');
             $table->enum('estado',['pentende','realizado']);
            $table->enum('resultado',['negativo','positivo'])->nullable();
             $table->time('hora');
            $table->date('dia');
           
            $table->integer('pessoal_clinico_id')->unsigned();
            $table->integer('utente_id')->unsigned();
            $table->integer('tipo_exame_id')->unsigned();
            $table->integer('especialidade_id')->unsigned();
           
            
            
            $table->foreign('utente_id')->references('id')
                     ->on('utentes')->onDelete('cascade');
             
             $table->foreign('pessoal_clinico_id')->references('id')
                     ->on('pessoal_clinicos')->onDelete('cascade');
             
             $table->foreign('tipo_exame_id')->references('id')
                     ->on('tipo_exames')->onDelete('cascade');
            
             $table->foreign('especialidade_id')->references('id')
                     ->on('especialidades')->onDelete('cascade');
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
        Schema::dropIfExists('exames');
    }
}
