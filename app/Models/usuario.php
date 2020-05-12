<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuario extends Authenticatable
{
    use Notifiable;

     const CREATED_AT = null;
     const UPDATED_AT = null;
     protected $rememberTokenName = 'usu_remember_token';
     protected $primaryKey = 'usu_id';
     protected $table = 'seg_usuarios';

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
    protected $hidden = ['usu_clave', 'usu_remember_token'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->usu_clave;
    }

    /**
     * Get the identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifier()
    {
        return $this->usu_cui;
    }

    public function getAuthIdentifierName()
    {
        return 'usu_cui';
    }
}
