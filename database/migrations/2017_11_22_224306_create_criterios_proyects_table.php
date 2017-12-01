<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriosProyectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterios_proyects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCriteria')->unsigned()->references('id')->on('criterios');
            $table->integer('idProyect')->unsigned()->references('id')->on('proyects');
            $table->integer('valueC');
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
        Schema::dropIfExists('criterios_proyects');
    }
}
