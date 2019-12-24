<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','department_id','name', 'username', 'email', 'status', 'password',
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

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
    public function teams(){
        return $this->belongsToMany('App\Team')->withTimestamps();
    }
    public function profile(){
        return $this->hasOne('App\Profile');
    }
    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function activities(){
        return $this->hasMany('App\Activity');
    }

}
