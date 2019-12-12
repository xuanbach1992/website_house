<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseCategory extends Model
{
    protected $table = 'house_category';

    protected $fillable = [
        'id', 'name',
    ];

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
