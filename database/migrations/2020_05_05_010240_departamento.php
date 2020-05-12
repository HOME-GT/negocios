<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_departamento', function (Blueprint $table) {
            $table->bigIncrements('dep_id');
            $table->string('dep_codigo',10)->nullable();
            $table->string('dep_nombre',250);
            $table->boolean('dep_estado')->default(true);
            $table->unsignedBigInteger('dep_pais_fk');
            $table->foreign('dep_pais_fk')->references('pais_id')->on('cat_pais');
            $table->timestamp('dep_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dep_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_departamento');
    }
}
