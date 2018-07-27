<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provincia_id')->unsigned();

            $table->string('name');

            $table->foreign('provincia_id')->references('id')
                    ->on('provincias')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('municipios');
    }

}
