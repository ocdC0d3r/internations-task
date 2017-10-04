<?php

namespace App;

use App\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'users_groups');
    }

    public function assignRole($roleId)
    {
        return $this->roles()->attach($roleId);
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get()->all() as $role) {
            if ($role->role === 'admin') {
                return true;
            }
        }

        return false;
    }
}