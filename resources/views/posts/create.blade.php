@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a New Post</div>

                    <div class="panel-body">
                        <p class="lead">Add to your post list below.</p>
                        <hr>

                        @include('partials.alerts.errors')

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => 'post.store']) !!}


                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Create New Post', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection