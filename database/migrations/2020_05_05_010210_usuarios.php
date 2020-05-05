<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_usuarios', function (Blueprint $table) {
            $table->bigIncrements('usu_id');
            $table->string('usu_nombres',50);
            $table->string('usu_apellidos',50);
            $table->string('usu_correo',50)->unique();            
            $table->string('usu_cui',20)->unique();
            $table->string('usu_clave');
            $table->string('usu_telefono',20);
            $table->boolean('usu_estado')->default(true);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seg_usuarios');
    }
}
