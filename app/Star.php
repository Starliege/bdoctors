<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $fillable = [
        'id',
        'vote',
        'user_id',
    ];
}
