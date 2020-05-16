<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horario_det extends Model
{
     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $table = 'neg_horario_det';
     protected $primaryKey = 'hord_id';

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
