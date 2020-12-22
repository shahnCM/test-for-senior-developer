<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pen extends Model
{
    protected $table = "pen_taken";
    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
}
