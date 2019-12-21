<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
      'name', 'status',
    ];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function teams(){
        return $this->hasMany('App\Team');
    }

    public function projects(){
        return $this->belongsToMany('App\Project');
    }

}
