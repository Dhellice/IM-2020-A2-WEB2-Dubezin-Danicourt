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
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>


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
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection