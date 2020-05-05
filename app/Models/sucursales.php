<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'suc_id';
     protected $table = 'neg_sucursales';

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

    public function negocio() {
        return $this->belongsTo('App\Models\negocio', 'suc_neg_fk', 'neg_id');
    }   
   
    public function ubicacion() {
        return $this->belongsTo('App\Models\ubicacion', 'suc_ubi_fk', 'ubi_id');
    }

    public function horario() {
        return $this->belongsTo('App\Models\horario', 'suc_hor_fk', 'hor_id');
    }
    
    public function contacto() {
        return $this->belongsTo('App\Models\contacto', 'suc_con_fk', 'con_id');
    }
}
