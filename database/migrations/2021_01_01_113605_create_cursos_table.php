<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes(); 
            $table->string('descripcion' , 255);
            $table->string('horario', 255);
            $table->bigInteger('profesor_id');
            $table->foreign('profesor_id')->references('id')->on('profesors');
            $table->bigInteger('profesor_adjunto_id')->nullable();
           $table->foreign('profesor_adjunto_id')->references('id')->on('profesors');
            $table->bigInteger('profesor_suplente_id')->nullable();
           $table->foreign('profesor_suplente_id')->references('id')->on('profesors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
