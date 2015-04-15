@extends('layout')

@section('title')
    @lang('action.register')
@stop

@section('content')

<div class="container">
    @if ($errors->all())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h1>@lang('action.register')</h1>
{{ Form::open(array('url' => 'users/register', 'role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('email', Lang::get('user.email'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('username', Lang::get('user.login'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::text('username', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password', Lang::get('user.password'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', Lang::get('user.password_confirmation'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-5">
            <button type="submit" class="btn btn-primary">@lang('action.register')</button>
        </div>
    </div>

{{ Form::close() }}

@stop
