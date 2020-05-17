<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'neg_horario';
    protected $primaryKey = 'hor_id';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [];

   /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];


    /** Fechas y tiempo */
    protected $dates = ['hor_ini_lun','hor_fin_lun','hor_ini_mar','hor_fin_mar','hor_ini_mie','hor_fin_mie','hor_ini_jue','hor_fin_jue','hor_ini_vie','hor_fin_vie','hor_ini_sab','hor_fin_sab','hor_ini_dom','hor_fin_dom','hor_fecha_creacion','hor_fecha_modificacion'];


    /**
     * Función para saber si el negocio esta abierto en un momento determinado
     */
    public function estaAbierto($dia){
        $inicio = date('U', strtotime($inicio));
        $fin = date('U',strtotime($fin));
        $now = date('U');
        return ($now >= $inicio) && ($now < $fin);
    }
}
