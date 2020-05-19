<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neg_horario', function (Blueprint $table) {
            $table->bigIncrements('hor_id');

            $table->time('hor_ini_lun');
            $table->time('hor_fin_lun');
            $table->boolean('hor_cer_lun')->default(false);

            $table->time('hor_ini_mar');
            $table->time('hor_fin_mar');
            $table->boolean('hor_cer_mar')->default(false);

            $table->time('hor_ini_mie');
            $table->time('hor_fin_mie');
            $table->boolean('hor_cer_mie')->default(false);

            $table->time('hor_ini_jue');
            $table->time('hor_fin_jue');
            $table->boolean('hor_cer_jue')->default(false);

            $table->time('hor_ini_vie');
            $table->time('hor_fin_vie');
            $table->boolean('hor_cer_vie')->default(false);

            $table->time('hor_ini_sab');
            $table->time('hor_fin_sab');
            $table->boolean('hor_cer_sab')->default(false);

            $table->time('hor_ini_dom');
            $table->time('hor_fin_dom');
            $table->boolean('hor_cer_dom')->default(false);

            $table->timestamp('hor_fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hor_fecha_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
