<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable=['id','body','user_id','star_id','created_at'];

    public function star(){
        return $this->belongsTo('App\Star');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
