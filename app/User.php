<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /**
     * The primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_firstname', 'user_lastname', 'user_email', 'user_name','user_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'user_remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function getRememberTokenName()
    {
        return $this->user_remember_token;
    }

    public function ViewedFiles(){
        return $this->hasMany('App\ViewedFiles', 'user_id', 'user_id');
    }
}
