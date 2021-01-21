<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->timestamps();
            $table->primary('id');
            $table->bigInteger('id');
            $table->integer('numero')->nullable(false);
            $table->string('edificio', 100)->nullable();
            $table->integer('planta')->nullable();
            $table->bigInteger('centro_id')->unsigned();

            $table->foreign('centro_id')->references('id')->on('centros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aulas');
    }
}
