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

Route::get('/articles', 'ArticlesController@index')->name('articles.index');

Route::post('/articles', 'ArticlesController@store');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/articles/{article}/edit', 'ArticlesController@edit');

Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('/payments/create', 'PaymentsController@create')->middleware('auth');

Route::post('/payments', 'PaymentsController@store')->middleware('auth');

Route::get('/notifications', 'UserNotificationsController@show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@show');

Route::post('/contact', 'ContactController@store');


/** Conversations Controllers */

Route::get('/conversations', 'ConversationsController@index');

Route::get('/conversations/{conversation}', 'ConversationsController@show');

// method to apply middleware to run authorisation on the conversation view 
// ->middleware('can:view,conversation'); 

Route::get('/best-reply/{reply}', 'ConversationBestReplyController@store');
