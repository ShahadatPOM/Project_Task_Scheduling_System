<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable=[
      'project_id', 'name', 'user_id', 'status'
    ];
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
