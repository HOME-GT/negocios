<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_municipio', function (Blueprint $table) {
            $table->bigIncrements('mun_id');
            $table->string('mun_codigo',10)->nullable();
            $table->string('mun_nombre',250);
            $table->boolean('mun_estado')->default(true);
            $table->unsignedBigInteger('mun_dep_fk');
            $table->foreign('mun_dep_fk')->references('dep_id')->on('cat_departamento');
            $table->timestamp('mun_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('mun_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_municipio');
    }
}
