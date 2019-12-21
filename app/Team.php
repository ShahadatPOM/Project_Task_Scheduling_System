<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'leader_id', 'name', 'department_id', 'members', 'status'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function projects(){
        return $this->belongsToMany('App\Project');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function leader(){
        return $this->belongsTo('App\User','leader_id');
    }

}
