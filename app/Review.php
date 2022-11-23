<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function user(){
    return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'name_reviewer',
        'surname_reviewer',
        'review',
        'user_id',
    ];
}
