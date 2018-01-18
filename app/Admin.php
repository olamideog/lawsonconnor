<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
	use Notifiable;

	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * The primaryKey associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'admin_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['admin_lastlogin', 'admin_firstname', 'admin_lastname', 'admin_username', 'admin_email', 'admin_password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'admin_password', 'admin_remember_token',
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->admin_password;
    }

    /**
     * Get the rememberuser for the user.
     *
     * @return string
     */
    public function getRememberTokenName() {
        return $this->admin_remember_token;
    }

    public function Files(){
        return $this->hasMany('App\Files', 'admin_id', 'admin_id');
    }
}
