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
            $table->string('usu_apellidos',50)->nullable();
            $table->string('usu_correo',50)->unique();
            $table->string('usu_cui',20)->unique();
            $table->string('usu_clave');
            $table->string('usu_remember_token')->nullable();
            $table->string('usu_telefono',20);
            $table->boolean('usu_estado')->default(true);
            $table->boolean('usu_admin')->default(false);
            $table->timestamp('usu_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('usu_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
