<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class negocio extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'neg_id';
     protected $table = 'neg_negocio';

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

    public function usuario() {
        return $this->belongsTo('App\Models\usuarios', 'neg_usu_fk', 'usu_id');
    }

    public function municipio() {
        return $this->belongsTo('App\Models\municipio', 'neg_mun_fk', 'mun_id');
    }

    public function categoria() {
        return $this->belongsTo('App\Models\categoria', 'neg_cat_fk', 'cat_id');
    }

    public function horarios() {
        return $this->hasMany('App\Models\horario', 'neg_hor_fk', 'hor_id');
    }

    public function contacto() {
        return $this->belongsTo('App\Models\contacto', 'neg_con_fk', 'con_id');
    }

    public function covid19() {
        return $this->belongsTo('App\Models\covid19', 'neg_cov_fk', 'cov_id');
    }

    public function formaspago() {
        return $this->belongsTo('App\Models\formaspago', 'neg_fpa_fk', 'fpa_id');
    }

    public function parqueos() {
        return $this->belongsTo('App\Models\parqueos    ', 'neg_par_fk', 'par_id');
    }

    public function sucursales() {
        return $this->hasMany('App\Models\sucursales', 'suc_neg_fk', 'neg_id');
    }
}
