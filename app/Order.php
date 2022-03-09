<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['restaurant_id', 'status', 'tot'];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    public function plates(){
        return $this->belongsToMany('App\Plate')->withPivot('quantity');
    }
}