@extends('layout')

@section('title')
@lang('user.registration')
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

    <h1>@lang('user.registration')</h1>
{{ Form::open(array('url' => 'users/register', 'role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('username', @lang('user.username'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::text('username', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password', @lang('user.password'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', @lang('planet.password_confirmation'), array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-5">
            <button type="submit" class="btn btn-primary">@land('user.registration')</button>
        </div>
    </div>

{{ Form::close() }}

@stop
