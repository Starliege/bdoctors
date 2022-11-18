<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Specialization as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Specialization extends Model
{
    protected $fillable = [
        'specialization'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
