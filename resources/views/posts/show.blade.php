@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Post Details</div>

                    <div class="panel-body">
                        
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->body }}</p>
                        
                        <hr>

                        <a href="{{ route('post.index') }}" class="btn btn-info">Back to all posts</a>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                        
                        {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $post->id],'style'=>'display:inline']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
