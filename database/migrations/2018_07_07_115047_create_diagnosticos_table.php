<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('procedimento');
            $table->time('hora');
            $table->date('dia');
            $table->integer('pessoal_clinico_id')->unsigned();
            $table->integer('rcu_id')->unsigned();
            $table->integer('consulta_id')->unsigned(); 
            
          
            
            
            $table->foreign('rcu_id')->references('id')
                     ->on('rcus')->onDelete('cascade');
             
             $table->foreign('pessoal_clinico_id')->references('id')
                     ->on('pessoal_clinicos')->onDelete('cascade');
             
             $table->foreign('consulta_id')->references('id')
                     ->on('consultas')->onDelete('cascade');
            
            
            
            
            
            
            
            
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
        Schema::dropIfExists('diagnosticos');
    }
}
