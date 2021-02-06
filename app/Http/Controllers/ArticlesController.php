<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

/**
 * 7 restful controller actions:
 * index: return a list
 * show: return a single resource
 * create: shows a view to create a resource
 * store: persist a new resource
 * edit: show a view to edit an existing resource
 * update: persist the edited resource
 * destroy: delete resource
 * 
 * 
 * CRUD: create, read, update, delete
 * 
 * CRUD relationship to HTTP methods:
 * GET /articles            // get articles 
 * GET /articles/create     // get view to create new article
 * POST /articles           // create new article
 * GET /articles/2          // get specific article
 * GET /articles/2/edit     // get view to edit specific article
 * PUT /articles/2/         // edit specific article
 * DELETE /articles/2/      // delete specific article
 * 
 * 
 * Custom notes - intepretation of 7 restful contoller actions in relation to CRUD
 * CRUD: store, show, update, destroy
 * VIEWS: index, create, edit, 
 */

class ArticlesController extends Controller
{

    public function index()
    {
        return view('articles.index', ['articles' => Article::paginate(10)]);
    }

    /**
     * note on using show(Article $article) 
     * it is the same as running $article = Article::find($id); within the method
     * important: Model name must match up with the wildcard used in the route handler ({artiicle} => Article)
     * this approach also handles the findOrFail logic. a 404 will be returned if no article is found
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {

        // dd(request()->all());

        request()->validate([
            'title' => 'required', // ['required', 'min:3', 'max:255']
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
        ]);

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        // alternatively use compact('article'). same result as ['article' => $article]
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {

        request()->validate([
            'title' => 'required', // ['required', 'min:3', 'max:255']
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }
}
