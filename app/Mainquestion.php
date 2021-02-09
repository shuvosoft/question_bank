<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainquestion extends Model
{
    protected $fillable=['user_id','semester_id','subject_id','section_id','term_id','mark_id','time_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function term(){
        return $this->belongsTo('App\Term');
    }
    public function time(){
        return $this->belongsTo('App\Time');
    }

    public function mark(){
        return $this->belongsTo('App\Mark');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    public function scopeUnpublished($query)
    {
        return $query->where('status', 0);
    }

    public function feedBacks(){
        return $this->hasMany('App\Comment');
    }
}
