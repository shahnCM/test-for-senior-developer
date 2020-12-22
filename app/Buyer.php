<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = "buyers";
    protected $guarded = [];

    public function diaries(){
        return $this->hasMany('App\Diary');
    }

    public function erasers(){
        return $this->hasMany('App\Eraser');
    }

    public function pens(){
        return $this->hasMany('App\Pen');
    }
}
