<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes;
    //mass assignment  เพิ่มข้อมูลหลายๆฟิลพร้อมกัน
    protected $fillable = ['detail'];

}
