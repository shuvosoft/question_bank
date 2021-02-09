<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subadmin(){
        return $this->belongsTo('App\Subadmin');
    }

    public function semesters(){
        return $this->belongsToMany('App\Semester')->withTimestamps();
    }

    public function subjects(){
        return $this->belongsToMany('App\Subject')->withTimestamps();
    }
    public function terms(){
        return $this->belongsToMany('App\Term')->withTimestamps();
    }

    public function sections(){
        return $this->belongsToMany('App\Section')->withTimestamps();
    }
    public function marks(){
        return $this->belongsToMany('App\Mark')->withTimestamps();
    }
    public function times(){
        return $this->belongsToMany('App\Time')->withTimestamps();
    }
    public function feedBacks(){
        return $this->hasMany('App\Feedback');
    }



    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    public function scopeUnpublished($query)
    {
        return $query->where('status', 0);
    }


}
