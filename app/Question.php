<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['mainquestion_id','q_no','body','q_mark'];

    public function user(){
        return $this->belongsTo('App\User');
    }



}
