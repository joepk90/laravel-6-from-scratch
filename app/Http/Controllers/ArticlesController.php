<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id) {
        
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);

    }

    public function paginate() {
        return view('articles.list', ['articles' => Article::paginate(10)]);
    }
}
