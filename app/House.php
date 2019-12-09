<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';

    protected $fillable = [
        'id', 'name', 'address', 'house_type', 'room_type',
        'bedrooms', 'bathroom', 'description', 'price','image',
    ];
}
