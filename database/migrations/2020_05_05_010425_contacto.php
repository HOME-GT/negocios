<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_contacto', function (Blueprint $table) {
            $table->bigIncrements('con_id'); 
            $table->string('con_telefono1');
            $table->string('con_telefono2');
            $table->string('con_correo1');
            $table->string('con_correo2');
            $table->string('con_facebook');
            $table->string('con_pagina');
            $table->string('con_google_maps');
            $table->string('con_whatsapp');
            $table->string('con_direccion');                             
            $table->timestamp('con_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('con_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_contacto');
    }
}
