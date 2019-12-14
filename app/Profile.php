<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
         'user_id', 'mobile', 'address', 'designation', 'education', 'specialist_in', 'image',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
