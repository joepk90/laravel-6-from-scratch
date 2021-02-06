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

    public function show($id)
    {

        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {

        // dd(request()->all());

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {

        $article = Article::find($id);

        // alternatively use compact('article'). same result as ['article' => $article]
        return view('articles.edit', ['article' => $article]);
    }

    public function update($id)
    {

        $article = Article::find($id);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }
}
