<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eraser extends Model
{
    protected $table = "eraser_taken";
    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
}
