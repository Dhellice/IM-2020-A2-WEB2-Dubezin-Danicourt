<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
        Comment::create([
            'body' => request('body'),
            'article_id' => $article->id

        ]);

        return back();
    }
}
