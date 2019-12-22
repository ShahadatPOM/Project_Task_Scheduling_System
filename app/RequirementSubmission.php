<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementSubmission extends Model
{
    protected $fillable = ['task_id','requirement_id','description','file','link'];

    protected function task()
    {
        return $this->belongsTo(Task::class);
    }

    protected function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
