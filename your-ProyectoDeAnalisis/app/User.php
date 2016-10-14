<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function roles()
    {
        return $this->belongsToMany('App\Rol', 'user_rol', 'user_id', 'rol_id');
    }
    
    public function tieneALgunRol($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->tieneRolAsignado($role)) {
                    return true;
                }
            }
        } else {
            if ($this->tieneRolAsignado($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function tieneRolAsignado($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
