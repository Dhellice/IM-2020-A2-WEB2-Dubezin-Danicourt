<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/article', 'ArticleController');
Route::resource('/comment', 'CommentsController');


Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);

Route::get('/admin', ['as' => 'admin.index', 'uses' => 'AdminsController@index']);
Route::get('/admin/{article}', ['as' => 'admin.show', 'uses' => 'AdminsController@show']);
Route::get('/admin/commentaires/{comment}', ['as' => 'admin.showcomment', 'uses' => 'AdminsCommentsController@show']);






Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', ['as' => 'user', 'uses' => 'UserController@index']);

Route::get('/contact',
    ['as' => 'contact', 'uses' => 'FormsController@create']);
Route::post('/contact',
    ['as' => 'contact_store', 'uses' => 'FormsController@store']);

Route::post('/article/{article}/comments', 'CommentsController@store');

Route::get('/image',
    ['as' => 'image.index', 'uses' => 'ImageController@index' ]);

Route::get('/image/upload',
    ['as' => 'image.upload', 'uses' => 'ImageController@upload' ]);

Route::post('/image',
    ['as' => 'image.store', 'uses' =>'ImageController@store' ]);

Route::get('/imagelist',
    ['as' => 'imagelist', 'uses' =>'ImageController@show' ]);

//EXO1

/*Route::get('/iim', function() {
   return view('exo1.iim');
});


Route::get('/bonjour/{name}', function($name) {
    return view('exo1.bonjour', ['prenom' => $name]);
});

Route::get('/test', function() {
    $age = 15;

    $tasks = [
        'Faire le ménage',
        'Envoyer un mail'
    ];

    return view('exo1.test', compact('age', 'tasks'));
});

Route::get('/page1', function() {
    return view('exo1.page1');
});

Route::get('/page2', function() {
    return view('exo1.page2');
});*/
