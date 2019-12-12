<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $table = 'room_category';

    protected $fillable = [
        'id', 'name',
    ];

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
