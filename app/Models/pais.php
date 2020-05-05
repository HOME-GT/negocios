<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $primaryKey = 'pai_id';
     protected $table = 'cat_pais';

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
}
