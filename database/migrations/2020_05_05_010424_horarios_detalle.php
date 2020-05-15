<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HorariosDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_horario_det', function (Blueprint $table) {
            $table->bigIncrements('hord_id');
            $table->integer('hord_dia');
            $table->time('hord_inicio');
            $table->time('hord_fin');
            $table->unsignedBigInteger('hord_hor_fk');
            $table->foreign('hord_hor_fk')->references('hor_id')->on('neg_horario');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_horario_det');
    }
}
