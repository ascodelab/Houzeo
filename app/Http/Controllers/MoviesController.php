<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Movie;
class MoviesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function getAll()
    {
        return Movie::all();
    }

    //get list of all people worked in a perticular movie
    public function getAllPeople(Request $request, $movie_id)
    {
        $movie = Movie::find($movie_id);
        //access relationship
        return $movie->people;
    }

    public function saveAll(Request $request)
    {
        // gett all requested data
        $movies = $request->input('data');
        // people array
        $moviesArray = [];
        $peopleArray = [];
        //converting data into array
        foreach($movies as $movie){
            //gettiing person id
            //print_r($person);
            $movie_id = explode("/",$movie['url'])[5];
            $f = [
                    'title'=>$movie['title'],
                    'episode_id'=>$movie['episode_id'],
                    'director'=>$movie['director'],
                    'producer'=>$movie['producer'],
                    'release_date'=>$movie['release_date'],
                    'movie_id'=>$movie_id
            ];
            //extracting all movies of people
            $peopleArray[$movie_id] = array_map(function($movie){ return explode("/",$movie)[5]; },$movie['characters']);
            // adding the curnet person
            array_push($moviesArray,$f);
            // adding movies to person
        }
        // call inser data function
        return $this->store($moviesArray,$peopleArray);
    }
    // making rth entries into database
    public function store($movies,$people){

        // iterating over people
        foreach($movies as $movie){
            //print_r($person);die($person);
            $newmovie =  Movie::create($movie);
            //print_r($movies[$person['person_id']]);
            // inser relatnship
            $this->storePeople($movie['movie_id'],$people[$movie['movie_id']]);          
        }
    }
    // storing movies
    public function storePeople($movie_id,$people){
        //inserting movies for person id 
        foreach($people as $person){

            DB::table('movie_person')->insert(['person_id'=>$person, 'movie_id'=>$movie_id]);

        }
    }
}
