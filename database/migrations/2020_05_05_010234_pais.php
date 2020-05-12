<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_pais', function (Blueprint $table) {
            $table->bigIncrements('pais_id');
            $table->string('pais_codigo',10)->nullable();
            $table->string('pais_nombre',50)->unique();
            $table->boolean('pais_estado')->default(true);
            $table->timestamp('pais_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pais_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_pais');
    }
}
