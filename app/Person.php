<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{   
    protected $guarded = [];
    // defining many to many relanship
    public function movies()
    {
        return $this->belongsToMany('App\Movie','movie_person','person_id','movie_id');
    }
}
