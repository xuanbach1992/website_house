<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'name', 'email', 'password', 'phone', 'address','provider',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function houses(){
        return $this->belongsTo(House::class);
    }
public function star(){
        return $this->hasMany('App\Star');
}
}
