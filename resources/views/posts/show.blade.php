@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Post {{$post->id}}</h1>
    </div>
    <div class="row card-body">
        <h3>Title: {{$post->title}} <br>Content: {{$post->content}} </h3>
        <img src="{{$post->path}}" style="width: 150px;">
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-evenly">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-success btn-lg">EDIT</a>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-evenly">
                <form action="/posts/{{$post->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-lg">
                </form>
            </div>
    </div>
</div>
<div class="card-footer d-flex justify-content-evenly"><a href="/posts" class="btn btn-primary btn-lg"> < Back to Posts Index </a></div>
@endsection