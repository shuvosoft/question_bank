<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $guarded;

    public function questionBankDetails()
    {
        return $this->hasMany('app\QuestionBankDetails');
    }
}
