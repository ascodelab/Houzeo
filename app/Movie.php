<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    // defining many to many relanship
    public function people()
    {
        return $this->belongsToMany('App\Person','movie_person','movie_id','person_id');
    }
}
