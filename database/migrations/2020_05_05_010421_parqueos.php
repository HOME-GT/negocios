<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parqueos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_parqueos', function (Blueprint $table) {
            $table->bigIncrements('par_id'); 
            $table->boolean('par_carros')->default(true);
            $table->integer('par_cantidad_carros')->default(0);
            $table->boolean('par_motos')->default(true);       
            $table->integer('par_cantidad_motos')->default(0);             
            $table->boolean('par_discapacitados')->default(true);       
            $table->integer('par_cantidad_discapacitados')->default(0);             
            $table->timestamp('par_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('par_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_parqueos');
    }
}
