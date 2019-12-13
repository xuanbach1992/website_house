<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';

    protected $fillable = [
        'id', 'path', 'house_id',
    ];

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
