<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    public function mainquestions()
    {
        return $this->hasMany('App\Mainquestion');
    }

}
