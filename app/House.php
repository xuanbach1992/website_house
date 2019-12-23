<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';

    protected $fillable = [
        'id', 'name', 'address', 'phone', 'bedrooms', 'bathroom', 'description',
        'price', 'image', 'house_category_id', 'room_category_id', 'cities_id',
        'district_id', 'status',
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


    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
//    public function users()
//    {
//        return $this->belongsToMany(User::class,'orders','house_id','user_id');
//    }
    public function star()
    {
        return $this->belongsTo('App\Star');
    }

}
