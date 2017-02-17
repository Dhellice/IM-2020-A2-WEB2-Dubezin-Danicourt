<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = Article::paginate(5);
        $comments = Comment::paginate(5);

        return view('admin.index', compact('articles', 'comments'));
    }


    public function show($id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect()->route('admin.index');
        }

        return view('admin.show', compact('article'));
    }
}
