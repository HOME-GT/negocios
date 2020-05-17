<?php

namespace App\Models;

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

    public function detalle() {
        return $this->hasMany('App\Models\horario_det', 'hord_hor_fk', 'hor_id');
    }

    public function detalledia(int $dia=null) {
        if($dia == null){
            return $this->belongsTo('App\Models\horario_det', 'hor_id', 'hord_hor_fk')->where('hord_dia', date("w"));
        }
        else{
            return $this->belongsTo('App\Models\horario_det', 'hor_id', 'hord_hor_fk')->where('hord_dia', $dia);
        }
    }

    public function estaAbierto($inicio, $fin){
        $inicio = date('U', strtotime($inicio));
        $fin = date('U',strtotime($fin));
        $now = date('U');
        return ($now >= $inicio) && ($now < $fin);
    }

    public function estaCerrado($inicio, $fin){
        $inicio = date('U', strtotime($inicio));
        $fin = date('U',strtotime($fin));
        return $inicio == $fin;
    }
}
