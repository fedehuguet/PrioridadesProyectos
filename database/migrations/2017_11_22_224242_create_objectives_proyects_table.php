<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectivesProyectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectives_proyects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idObjective')->unsigned()->references('id')->on('objectives');
            $table->integer('idProyect')->unsigned()->references('id')->on('proyects');
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
        Schema::dropIfExists('objectives_proyects');
    }
}
