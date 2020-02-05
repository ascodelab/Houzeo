<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class HouzeoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        return view('index');
    }
    // show list for all people 
    public function browsepeople()
    {
        return view('browsepeople');
    }
    // show list for all movies
    public function browsemovies()
    {
        return view('browsemovies');
    }
    // list people
    public function people($movie_id)
    {
        return view('people',['movie_id' => $movie_id ]);
    }
    // list movies
    public function movies($person_id)
    {
        return view('movies',['movie_id' => $person_id ]);
    }
}
