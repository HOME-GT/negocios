<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Covid19 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_covid19', function (Blueprint $table) {
            $table->bigIncrements('cov_id');            
            $table->boolean('cov_mascarilla')->default(true);
            $table->boolean('cov_guantes')->default(true);                    
            $table->boolean('cov_alcohol_gel')->default(true);                    
            $table->timestamp('cov_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cov_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));              
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cov_covid19');
    }
}
