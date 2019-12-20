<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';

    protected $fillable = [
        'id', 'name', 'cities_id',
    ];

    public function cities()
    {
        return $this->belongsTo('App\Cities');
    }

    public function house()
    {
        return $this->hasMany('App\House');
    }
}
