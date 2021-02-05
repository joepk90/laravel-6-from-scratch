<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() {
        return view('articles.index', ['articles' => Article::paginate(10)]);
    }

    public function show($id) {
        
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);

    }
}
