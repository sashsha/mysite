@extends('layout')

@section('title')
    @lang('action.password.reset')
@stop

@section('content')
    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <h2>@lang('action.password.reset')</h2>

        {{ Form::open(array('url' => action('RemindersController@postReset'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">@lang('user.email')</label>
                <div class="col-sm-5">
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">@lang('action.password.new')</label>
                <div class="col-sm-5">
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">@lang('action.password.repeat')</label>
                <div class="col-sm-5">
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
            </div>

            <input type="hidden" name="token" value="{{ $token }}" />

            <div class="form-group">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">@lang('action.reset')</button>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
