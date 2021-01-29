<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug) {

        $posts = [
            'first-post' => 'My first blog post...',
            'second-post' => 'My second blog post...'
        ];

       
        if (array_key_exists($slug, $posts) === false) {
            abort(404, 'Sorry, post not found');
        }


        return view('post', [
            'post' => $posts[$slug]
        ]);

    }
}
