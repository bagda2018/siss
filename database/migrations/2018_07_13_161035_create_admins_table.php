<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
        public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->date('data');
            $table->string('telefone',12)->unique();
            $table->string('email')->unique();
            $table->string('codigo_postal')->unique();
            
            $table->integer('user_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
             
           
            
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
        Schema::dropIfExists('admins');
    }
}
