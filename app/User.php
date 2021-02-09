<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name','username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function mainquestions()
    {
        return $this->hasMany('App\Mainquestion');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function feedBacks(){
        return $this->hasMany('App\Feedback');
    }

    public function scopeAuthors($query)
    {
        return $query->where('role_id',2);
    }

}
