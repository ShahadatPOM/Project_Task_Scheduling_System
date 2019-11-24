<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAssign extends Model
{
    protected $fillable = [
      'project_id', 'manager_id', 'team_id', 'status'
    ];
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function team(){
        return $this->belongsTo('App\Team');
    }
}
