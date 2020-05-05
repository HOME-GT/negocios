<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'ima_id';
     protected $table = 'neg_imagenes';

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
        return $this->belongsTo('App\Models\negocio', 'ima_neg_fk', 'neg_id');
    }
}
