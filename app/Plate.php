<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'visible', 'ingredients', 'category_id', 'restaurant_id'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
