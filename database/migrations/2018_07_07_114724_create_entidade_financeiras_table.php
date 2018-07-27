<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadeFinanceirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidade_financeiras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_id')->unsigned();
            
            $table->string('name')->unique();
            
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
        Schema::dropIfExists('entidade_financeiras');
    }
}
