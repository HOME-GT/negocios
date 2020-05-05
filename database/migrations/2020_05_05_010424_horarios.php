<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Horarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_horario', function (Blueprint $table) {
            $table->bigIncrements('hor_id'); 
            $table->integer('hor_dia');
            $table->time('hor_inicio');
            $table->time('hor_fin');                    
            $table->timestamp('hor_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hor_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_horario');
    }
}
