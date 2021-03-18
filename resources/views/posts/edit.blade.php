@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Post List</div>

                    <div class="panel-body">

                        <h1>Edit Task - Task Name </h1>
                        <p class="lead">Edit this post below. <a href="{{ route('post.index') }}">Go back to all posts.</a></p>
                        <hr>

                        @include('partials.alerts.errors')

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        {!! Form::model($post, ['method' => 'PATCH', 'route' => ['post.update', $post->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
                            {!! Form::text('body', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
