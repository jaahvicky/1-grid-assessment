@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts List</div>

                    <div class="panel-body">
                        <p class="lead">Here's a list of all Posts <a href="/post/create">Add a new one?</a></p>

                        @foreach($posts as $post)
                            <h3>{{ $post->title}}</h3>
        
                            <p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">View Post</a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                            </p>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
