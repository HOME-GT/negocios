<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'dep_id';
     protected $table = 'cat_departamento';

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

    public function pais() {
        return $this->belongsTo('App\Models\pais', 'dep_pai_fk', 'pai_id');
   }
}
