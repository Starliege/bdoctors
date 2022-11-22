<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'address', 'image', 'cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function specializations(){
        return $this->belongsToMany('App\Specialization');
    }
    public function stars(){
        return $this->belongsToMany('App\Star');
    }
    public function sponsorships(){
        return $this->belongsToMany('App\Sponsorship');
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
}