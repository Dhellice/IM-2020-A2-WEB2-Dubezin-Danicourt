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

                            <a class="btn btn-primary navbar-btn" href="{{ route('article.like', $article->id) }}">Aimer l'Article</a><br>
                            <a class="btn btn-primary navbar-btn" href="{{route('article.edit', [$article->id])}}">Modifier l'article</a><br>
                                <a class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal2"> Partager sur les réseaux sociaux </a><br>


                            <hr>

                            <div class="comments">
                                <ul class="list-group">
                                    @foreach ($article->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->body }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>


                            <hr>

                            <div class="card">
                                <div class="card-block">
                                    <form method="POST" action="/article/{{ $article->id }}/comments">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea name="body" placeholder="Votre commentaire." class="form-control">

                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

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