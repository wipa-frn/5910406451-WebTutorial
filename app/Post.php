<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //mass assignment  เพิ่มข้อมูลหลายๆฟิลพร้อมกัน
    protected $fillable = ['title','detail'];

    public function comments() //เติม S = has many -> get collection
    {
        return $this->hasMany('App\Comment');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

}
