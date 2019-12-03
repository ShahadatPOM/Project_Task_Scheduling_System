<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'client', 'estimated_budget', 'estimated_project_duration', 'status'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function departments(){
        return $this->hasMany('App\Department');
    }

    protected $casts=['departments' => 'array'];

}
