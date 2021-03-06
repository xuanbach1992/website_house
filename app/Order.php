<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $dates = ['dob'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
