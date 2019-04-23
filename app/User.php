<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() //เติม S = has many -> get collection
    {
        return $this->hasMany('App\Comment');
    }
    
    public function posts(){
        return $this->hasMany('App\Post');
    }    
    
    //check role who are ADMIN
    public function isAdmin(){
        return $this->role === ('ADMINISTRATOR');
    }

    public function isCreator(){
        return $this->role === ('CREATOR');
    }
}
