<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_trabalhos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoal_clinico_id')->unsigned();
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->date('data');
            
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
        Schema::dropIfExists('agenda_trabalhos');
    }
}
