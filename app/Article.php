<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * Mass Assignemnt
     * properties are by defualt protected from mass assignment
     * mass assignment means updating several values at once
     * 
     * the reason this is protected is to prevent mass unprotected updates
     * for example logic could assign any number of potentially dangerous values to a users record
     * User::create(request()->all()) // ['name' => 'newname', 'paying_subscriber' => true, 'admin' => true]
     */

    protected $fillable = ['title', 'excerpt', 'body'];
    // protected $gaurded = []  // alternatively remove any protection against mass assignment



    /**
     * Override Default Query Key
     * overrride default key laravel uses when querying a model (default: id)
     * example use case: using the slug as the wildcard 
     */

    // public function getRouteKeyName()
    // {
    //     return 'slug'; // article::where('slug', $article)->first();
    // }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
    }
}
