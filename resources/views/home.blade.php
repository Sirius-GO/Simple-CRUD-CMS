@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-evenly">
                    <a href="/posts" class="btn btn-primary btn-lg"> View Posts Index </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
