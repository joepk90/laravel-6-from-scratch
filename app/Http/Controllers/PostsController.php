<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug) {

        /**
         * DB: Query Builder
         * API for constructing safe, clean, sql queries
         */

        // post = \DB::table('posts')->where('slug', $slug)->first(); \ required if not imported at the top
        // $post = DB::table('posts')->where('slug', $slug)->first();

        // firstOrFail: return first post that matches or throw an error creating a model not found exception returning a 404
        $post = Post::where('slug', $slug)->firstOrFail(); 

        return view('post', [
            'post' => $post
        ]);

    }
}
