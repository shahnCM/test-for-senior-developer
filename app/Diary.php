<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = "diary_taken";
    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
}
