<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_sucursales', function (Blueprint $table) {
            $table->bigIncrements('suc_id'); 
            $table->unsignedBigInteger('suc_neg_fk');
            $table->foreign('suc_neg_fk')->references('neg_id')->on('neg_negocio');
            $table->unsignedBigInteger('suc_ubi_fk');
            $table->foreign('suc_ubi_fk')->references('ubi_id')->on('cat_ubicacion');             
            $table->unsignedBigInteger('suc_hor_fk');
            $table->foreign('suc_hor_fk')->references('hor_id')->on('neg_horario');
            $table->unsignedBigInteger('suc_con_fk');
            $table->foreign('suc_con_fk')->references('con_id')->on('neg_contacto');            
            $table->timestamp('suc_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('suc_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_sucursales');
    }
}
