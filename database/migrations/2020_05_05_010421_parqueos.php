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
            $table->decimal('par_precio_carros')->default(0);
            $table->decimal('par_precio_motos')->default(0);
            $table->decimal('par_precio_discapacitados')->default(0);

            $table->integer('par_cantidad_carros')->default(0);
            $table->integer('par_cantidad_motos')->default(0);
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
