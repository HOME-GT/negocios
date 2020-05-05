<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormasPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_formas_pago', function (Blueprint $table) {
            $table->bigIncrements('fpa_id'); 
            $table->boolean('fpa_efectivo')->default(true);
            $table->boolean('fpa_tarjetas')->default(false);                    
            $table->timestamp('fpa_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fpa_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_formas_pago');
    }
}
