<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable= [
        'title', 'description', 'client', 'estimated_budget', 'estimated_project_duration','status'
    ];
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }
    public function assigns(){
        return $this->hasMany('App\ProjectAssign');
    }

}
