<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name', 'department_id', 'members', 'status'
    ];
    protected $casts =['members'=>'array'];

    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function projects(){
        return $this->hasMany('App\Project');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }

    /*protected $casts = ['members' => 'array'];*/
}
