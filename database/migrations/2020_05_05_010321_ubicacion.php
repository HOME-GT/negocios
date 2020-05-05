<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ubicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_ubicacion', function (Blueprint $table) {
            $table->bigIncrements('ubi_id');
            $table->string('ubi_codigo',10)->nullable();
            $table->string('ubi_nombre',50)->unique();
            $table->boolean('ubi_estado')->default(true);            
            $table->unsignedBigInteger('ubi_mun_fk');
            $table->foreign('ubi_mun_fk')->references('mun_id')->on('cat_municipio');
            $table->timestamp('ubi_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ubi_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_ubicacion');
    }
}
