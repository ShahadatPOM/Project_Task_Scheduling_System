<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
      'project_id', 'member_id', 'description', 'filename', 'status'
    ];
    protected $casts = ['filename','array'];
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
    public function requirements(){
        return $this->belongsToMany('App\Requirement');
    }
}
