<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/example', function () {

    // return 'hello world';
    return ['john', 'smith']; // laravel will automatically convert to JSON

});


Route::get('/test', function () {

    $name = request('name');

    return view('test', [
        'name' => $name
    ]);

});


/**
 * Wildcard example
 */
Route::get('/post/{post}', function ($post) {

     $posts = [
        'first-post' => 'My first blog post...',
        'second-post' => 'My second blog post...'
    ];

    if (array_key_exists($post, $posts) === false) {
        abort(404, 'Sorry, post not found');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);

});