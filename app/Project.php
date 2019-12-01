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

    public function requirements(){
        return $this->hasMany('App\Requirement');
    }

    public function assign()
    {
        return $this->hasOne('App\ProjectAssign');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }

    protected $casts=['departments' => 'array'];

}
