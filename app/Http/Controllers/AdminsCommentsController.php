<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class AdminsCommentsController extends Controller
{

    public function show($id)
    {
        $comment = Comment::find($id);

        if(!$comment) {
            return redirect()->route('admin.index');
        }

        return view('admin.commentshow', compact('comment'));
    }
}
