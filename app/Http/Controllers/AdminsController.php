<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = Article::paginate(5);

        return view('admin.index', ['articles' => $articles]);
    }
}
