<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $fillable = ['id','house_id','number','content','user_id'];

    public function house(){
        return $this->belongsTo('App\House');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
