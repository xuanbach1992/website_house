<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';

    protected $fillable = [
        'id', 'name', 'address', 'phone', 'bedrooms', 'bathroom', 'description',
        'price', 'image', 'house_category_id', 'room_category_id', 'cities_id'
    ];

    public function houseCategory()
    {
        return $this->hasMany('App\HouseCategory');
    }

    public function roomCategory()
    {
        return $this->hasMany('App\RoomCategory');
    }

    public function cities()
    {
        return $this->belongsTo('App\Cities');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

}
