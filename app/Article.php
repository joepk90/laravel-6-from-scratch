<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // overrride default key laravel uses when querying a model (default: id)
    // example use case: using the slug as the wildcard 
    // public function getRouteKeyName()
    // {
    // return 'slug'; // article::where('slug', $article)->first();
    // }
}
