@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <hr>
                    <div class="panel-heading" style="font-size:20px; text-align:center;">Articles</div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>

                            <a class="btn btn-default navbar-btn" href="{{route('admin.show', ['id' => $article->id])}}">
                                Voir mon article
                            </a> <br>
                            <a>
                                <form method="POST" class="form-horizontal" action="{{route('article.destroy', [$article->id])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="form-group">
                                        <div class="col-xs-10">
                                            <button type="submit" class="btn btn-primary">Supprimer</button>
                                        </div>
                                    </div>
                                </form>
                            </a>

                                <a class="btn btn-default navbar-btn" href="{{route('article.edit', ['id' => $article->id])}}"> Modifier l'article </a>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>

                    <div class="text-center">
                        {{$articles->links()}}
                    </div>

                    <hr>
                    <div class="panel-heading" style="font-size:20px; text-align:center;">Commentaires</div>
                        <div class="panel-body">

                        @forelse($comments as $comment)
                            <h1>{{ $comment->body }}</h1>
                            <a class="btn btn-default navbar-btn" href="{{route('admin.showcomment', ['id' => $comment->id])}}">
                                Voir mon commentaire
                            </a>

                                <a>
                                    <form method="POST" class="form-horizontal" action="{{route('comment.destroy', [$comment->id])}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="form-group">
                                            <div class="col-xs-10">
                                                <button type="submit" class="btn btn-primary">Supprimer</button>
                                            </div>
                                        </div>
                                    </form>
                                </a>

                                <a class="btn btn-default navbar-btn" href="{{route('comment.edit', ['id' => $comment->id])}}"> Modifier le commentaire </a>
                        @empty
                            Rien du tout
                        @endforelse

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
