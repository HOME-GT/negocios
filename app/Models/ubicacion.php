<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ubicacion extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'ubi_id';
     protected $table = 'cat_ubicacion';

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

    public function municipio() {
        return $this->belongsTo('App\Models\municipio', 'ubi_mun_fk', 'mun_id');
   }
}
