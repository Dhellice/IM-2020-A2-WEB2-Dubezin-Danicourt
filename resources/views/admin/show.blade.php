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

                        <a class="btn btn-primary navbar-btn" href="{{route('article.edit', [$article->id])}}">Modifier l'article</a><br>


                        <a class="btn btn-default navbar-btn" href="{{route('admin.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection