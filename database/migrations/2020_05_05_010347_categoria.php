<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_categoria', function (Blueprint $table) {
            $table->bigIncrements('cat_id');            
            $table->string('cat_nombre',50)->unique();            
            $table->string('cat_descripcion')->nullable();   
            $table->boolean('cat_estado')->default(true);            
            $table->timestamp('cat_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cat_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_categoria');
    }
}
