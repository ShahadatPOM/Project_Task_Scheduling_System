<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable =[
        'project_id', 'name', 'percentage',
    ];

    public function tasks(){
        return $this->belongsToMany('App\Task');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
