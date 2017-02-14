<?php

namespace App\Http\Controllers;

use App\Article;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{


    public function likeArticle($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Article', $id);

    }

    public function handleLike($type, $id)
    {
        $article = Article::find($id);
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);

        } else {
            return redirect()->route('article.index');
        }
        return view('articles.likes', compact('article'));

    }
}