<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function mainquestions()
    {
        return $this->hasMany('App\Mainquestion');
    }
}
