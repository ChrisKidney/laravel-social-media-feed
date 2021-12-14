<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */

    public function isUserAdmin() {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->id == 1)
            {
                return true;
            }
        }

        return false;
    }

    public function isModerator() {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->id == 2)
            {
                return true;
            }
        }

        return false;
    }

    public function isThemeManager() {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->id == 3)
            {
                return true;
            }
        }

        return false;
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by', 'id');
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'created_by', 'id');
    }
}
