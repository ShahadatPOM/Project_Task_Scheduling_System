<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
         'mobile', 'address', 'designation', 'education', 'specialist_in', 'image',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
