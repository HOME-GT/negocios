<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Negocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_negocio', function (Blueprint $table) {
            $table->bigIncrements('neg_id'); 
            $table->unsignedBigInteger('neg_usu_fk');
            $table->foreign('neg_usu_fk')->references('usu_id')->on('seg_usuarios');
            $table->unsignedBigInteger('neg_ubi_fk');
            $table->foreign('neg_ubi_fk')->references('ubi_id')->on('cat_ubicacion');
            $table->string('neg_nombre');
            $table->string('neg_descripcion');
            $table->unsignedBigInteger('neg_cat_fk');
            $table->foreign('neg_cat_fk')->references('cat_id')->on('cat_categoria');
            $table->unsignedBigInteger('neg_hor_fk');
            $table->foreign('neg_hor_fk')->references('hor_id')->on('neg_horario');
            $table->unsignedBigInteger('neg_con_fk');
            $table->foreign('neg_con_fk')->references('con_id')->on('neg_contacto');
            $table->unsignedBigInteger('neg_cov_fk');
            $table->foreign('neg_cov_fk')->references('cov_id')->on('neg_covid19');
            $table->unsignedBigInteger('neg_fpa_fk');
            $table->foreign('neg_fpa_fk')->references('fpa_id')->on('neg_formas_pago');
            $table->unsignedBigInteger('neg_par_fk');
            $table->foreign('neg_par_fk')->references('par_id')->on('neg_parqueos');            
            $table->timestamp('neg_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('neg_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_negocio');
    }
}
