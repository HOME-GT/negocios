<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_imagenes', function (Blueprint $table) {
            $table->bigIncrements('ima_id'); 
            $table->string('ima_nombre');            
            $table->unsignedBigInteger('ima_neg_fk');
            $table->foreign('ima_neg_fk')->references('neg_id')->on('neg_negocio');
            $table->timestamp('ima_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ima_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neg_imagenes');
    }
}
