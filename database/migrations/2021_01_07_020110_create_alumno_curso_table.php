<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->bigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_curso');
    }
}
