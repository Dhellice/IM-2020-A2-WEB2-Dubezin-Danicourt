@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <p>
                            @if($article->user)
                                Utilisateur: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>


                        <a href="{{ route('article.like', $article->id) }}">Like this awesome product!</a><br>



                        <a class="btn btn-default navbar-btn"  data-toggle="modal" data-target="#myModal2"> Partager sur les réseaux sociaux </a><br>
                        <a class="btn btn-default navbar-btn" href="{{route('article.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Partager sur les réseaux sociaux</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <a class="btn btn-default navbar-btn"  data-toggle="modal" data-target="#myModal2" href="#" onclick='window.open("http://www.facebook.com/sharer.php?u=http://127.0.0.1:8000/article/{article}", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=640, height=400");'> Partager sur Facebook </a>
                        <a class="btn btn-default navbar-btn"  data-toggle="modal" data-target="#myModal2" href="#" onclick='window.open("https://twitter.com/intent/tweet?text=Trop+Beau+Site+!&url=http://127.0.0.1:8000/article/{id}", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=640, height=400");'> Partager sur Twitter </a>
                        <a class="btn btn-default navbar-btn"  data-toggle="modal" data-target="#myModal2" > Partager sur Instagram </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection