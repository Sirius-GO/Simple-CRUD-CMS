@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit Post</h1>
    </div>
    <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
    <div class="card-body py-4 px-4">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Enter Title" class="form-control" value="{{$post->title}}">
            <label for="content">Content</label>
            <input type="text" name="content" placeholder="Enter Body Text" class="form-control" value="{{$post->content}}">
            <label for="Image">Image</label>
            <input type="file" name="fileUpload" class="form-control">
            <input type="hidden" name="_method" value="PUT">
            <br>
    </div>
    <div class="card-footer d-flex justify-content-evenly">
        <input type="submit" name="submit" value="Update Post" class="btn btn-success btn-lg">
        <a href="/posts" class="btn btn-primary btn-lg"> Back to Posts Index </a>
    </div>
</div>
</form>

@endsection