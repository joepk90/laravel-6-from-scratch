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

// not required: used to help ide navigation
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {

    // query examples
    // $article = App\Article::all(); // get all article posts
    // $article = App\Article::take(2)->get(); // get 2 article posts
    // $article = App\Article::paginate(2); // get paginated articles
    // $article = App\Article::latest()->get(); // get all article posts ordered by created at in decending order
    // $article = App\Article::latest('updated_at')->get(); // get all article posts ordered by updated_at in decending order

    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);

});

Route::get('/articles', 'ArticlesController@index');

Route::get('/articles/{article}', 'ArticlesController@show');

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

Route::get('/post/{post}', 'PostsController@show');