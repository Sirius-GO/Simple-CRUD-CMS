@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>All Posts Index</h1>
    </div>
    <div class="card-body">
        <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item"> 
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <h3><img src="{{$post->path}}" style="height: 70px;"> {{$post->title}}</h3>
                </div>
                <div class="col-sm-12 col-md-3">
                    <a href="/posts/{{$post->id}}" class="btn btn-success btn-lg d-flex justify-content-evenly"> View Post </a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    <div class="card-footer d-flex justify-content-evenly"><a href="/posts/create" class="btn btn-primary btn-lg pull-right"> Create a New Post </a></div>
</div>
@endsection

