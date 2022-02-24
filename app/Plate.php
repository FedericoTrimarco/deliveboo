<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    public function catgeory(){
        return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
