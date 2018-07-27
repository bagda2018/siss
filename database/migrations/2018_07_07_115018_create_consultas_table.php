<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado', ['pendente','cancelada', 'realizado']);
            $table->time('hora');
            $table->date('dia');

            $table->integer('utente_id')->unsigned();
            $table->integer('especialidade_id')->unsigned()->nullable();
            $table->integer('pessoal_clinico_id')->unsigned()->nullable();


            $table->foreign('utente_id')->references('id')
                    ->on('utentes')->onDelete('cascade');

            $table->foreign('pessoal_clinico_id')->references('id')
                    ->on('pessoal_clinicos')->onDelete('cascade');

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
    public function down() {
        Schema::dropIfExists('consultas');
    }

}
