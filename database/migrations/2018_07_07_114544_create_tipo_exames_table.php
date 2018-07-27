<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoExamesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tipo_exames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();

            $table->integer('especialidade_id')->unsigned();



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
        Schema::dropIfExists('tipo_exames');
    }

}
