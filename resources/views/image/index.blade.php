@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard  <a style= "margin-left: 75%" href="{{ url('article/create') }}">Nouvel article</a></div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>
                            <a href="{{route('image.upload')}}">
                                Ajouter une image
                            </a>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->

                </div>
            </div>
        </div>
    </div>
@endsection
