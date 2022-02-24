<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function typologies(){
        return $this->belongsToMany('App\Typology');
    }

    public function plates(){
        return $this->hasMany('App\Plate');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
