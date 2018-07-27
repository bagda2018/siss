<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(\App\Role::class);
    }

    
    
    
    public function peloMenos1Regra($roles) {
        if (is_array($roles) || is_object($roles)) {
            return !!$roles->intersect($this->roles)->count();
        }
        //quando entra só uma role
        return $this->roles->contains('nome', $roles);
    }

    public function hasPermission(Permission $permission) {
        // return peloMenos1Regra($permission->roles);
        $roles = $permission->roles;
        if (is_array($roles) || is_object($roles)) {
            return !!$roles->intersect($this->roles)->count();
        }
        //quando entra só uma role
        return $this->roles->contains('nome', $roles);
    }

}

