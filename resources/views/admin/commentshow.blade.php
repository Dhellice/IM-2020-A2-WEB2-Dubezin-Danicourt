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


                        <div class="comments">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </strong>
                                    {{ $comment->body }}
                                </li>

                                <li>  <a class="btn btn-primary navbar-btn" href="{{route('comment.edit', ['id' => $comment->id])}}">Modifier le commentaire</a><br>
                                </li>

                            </ul>
                        </div>


                        <hr>



                        <a class="btn btn-default navbar-btn" href="{{route('admin.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection