<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug) {

        $post = \DB::table('posts')->where('slug', $slug)->first();
       
        if ($post === null) {
            abort(404, 'Sorry, post not found');
        }

        return view('post', [
            'post' => $post
        ]);

    }
}
