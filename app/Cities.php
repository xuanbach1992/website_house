<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'id', 'name',
    ];

    public function house()
    {
        return $this->hasMany('App\House');
    }
}
