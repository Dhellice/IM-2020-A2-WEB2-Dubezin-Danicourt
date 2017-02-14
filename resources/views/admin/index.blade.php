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
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>

                            <a class="btn btn-default navbar-btn" href="{{route('article.show', ['id' => $article->id])}}">
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
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
