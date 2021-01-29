<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PostsController extends Controller
{
    public function show($slug) {

        /**
         * DB: Query Builder
         * API for constructing safe, clean, sql queries
         */

        // post = \DB::table('posts')->where('slug', $slug)->first(); \ required if not imported at the top
        $post = DB::table('posts')->where('slug', $slug)->first();
       
        if ($post === null) {
            abort(404, 'Sorry, post not found');
        }

        return view('post', [
            'post' => $post
        ]);

    }
}
