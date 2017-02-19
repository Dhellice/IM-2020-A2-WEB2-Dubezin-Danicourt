@extends('layouts.app')

@section('content')
<h1 class="well well-lg">All Image List</h1>
@foreach( $images as $image )
    <div class="table table-bordered bg-success"><a href="{!! '/images/'.$image->filePath !!}">{{$image->filePath}}</a></div>
@endforeach
@endsection
