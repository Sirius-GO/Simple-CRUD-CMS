@extends('layouts.app')

@section('content')
<div class="card">
<div class="card-header">
    <h1>Create Post</h1>
</div>
<form action="/posts" method="post" enctype="multipart/form-data"> 
    <div class="row card-body px-4 py-4">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Enter Title" class="form-control">
            <label for="content">Content</label>
            <input type="text" name="content" placeholder="Enter Body Text" class="form-control">
            <label for="Image">Image</label>
            <input type="file" name="fileUpload" class="form-control">
            <br>
    </div>
    <div class="card-footer  d-flex justify-content-evenly">
        <input type="submit" name="submit"  value="Create a New Post" class="btn btn-success btn-lg">
        <a href="/posts" class="btn btn-primary btn-lg"> Back to Posts Index </a>
    </div>
</form>
</div>

@endsection