<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;

use Illuminate\Support\Facades\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(5);

        return view('comments.index', ['comments' => $comments]);
    }


    public function store(Article $article)
    {
        Comment::create([
            'body' => request('body'),
            'article_id' => $article->id

        ]);

        return back();
    }


    public function show($id)
    {
        $comment = Comment::find($id);

        if(!$comment) {
            return redirect()->route('comment.index');
        }

        return view('comments.show', compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        if(!$comment) {
            return redirect()->route('article.index');
        }

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = Comment::find($id);

        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('article.index')->with('success', 'Commentaire modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->route('article.index')->with('success', 'Commentaire supprimé');

    }

}
