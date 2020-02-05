<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Person;

class PeopleController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function getAll()
    {
        return Person::all();
    }

    // get the list of all movies a particular person worked in
    public function getAllMovies(Request $request, $person_id)
    {
        $person = Person::find($person_id);
        //access relationship
        return $person->movies;
    }

    public function saveAll(Request $request)
    {
        // gett all requested data
        $people = $request->input('data');
        // people array
        $peopleArray = [];
        $filmsArray = [];
        //converting data into array
        foreach($people as $person){
            //gettiing person id
            //print_r($person);
            $person_id = explode("/",$person['url'])[5];
            $p = [
                    'name'=>$person['name'],
                    'height'=>$person['height'],
                    'mass'=>$person['mass'],
                    'hair_color'=>$person['hair_color'],
                    'skin_color'=>$person['skin_color'],
                    'gender'=>$person['gender'],
                    'person_id'=>$person_id
            ];
            //extracting all movies of people
            $filmsArray[$person_id] = array_map(function($film){ return explode("/",$film)[5]; },$person['films']);
            // adding the curnet person
            array_push($peopleArray,$p);
            // adding movies to person
        }
        // call inser data function
        return $this->store($peopleArray,$filmsArray);
    }
    // making rth entries into database
    public function store($people,$films){

        // iterating over people
        foreach($people as $person){
            //print_r($person);die($person);
            $newPerson =  Person::create($person);
            //print_r($films[$person['person_id']]);
            // inser relatnship
            $this->storeMovies($person['person_id'],$films[$person['person_id']]);          
        }
    }
    // storing movies
    public function storeMovies($person_id,$movies){
        //inserting movies for person id 
        foreach($movies as $movie){
            DB::table('movie_person')->insert(['person_id'=>$person_id, 'movie_id'=>$movie]);
        }
    }
}
