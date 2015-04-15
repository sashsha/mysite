@extends('layout')

@section('title')
<<<<<<< HEAD
Сброс пароля
=======
    @lang('action.password.reset')
>>>>>>> 0209a5d364eaa2acfb6ac10c71a4cef64fbb2ba0
@stop

@section('content')
    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

<<<<<<< HEAD
        <h2>Сброс пароля</h2>

        {{ Form::open(array('url' => action('RemindersController@postReset'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Ваш E-Mail</label>
=======
        <h2>@lang('action.password.reset')</h2>

        {{ Form::open(array('url' => action('RemindersController@postReset'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">@lang('user.email')</label>
>>>>>>> 0209a5d364eaa2acfb6ac10c71a4cef64fbb2ba0
                <div class="col-sm-5">
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
<<<<<<< HEAD
                <label for="password" class="col-sm-2 control-label">Новый пароль</label>
=======
                <label for="password" class="col-sm-2 control-label">@lang('action.password.new')</label>
>>>>>>> 0209a5d364eaa2acfb6ac10c71a4cef64fbb2ba0
                <div class="col-sm-5">
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
<<<<<<< HEAD
                <label for="password_confirmation" class="col-sm-2 control-label">Повторите</label>
=======
                <label for="password_confirmation" class="col-sm-2 control-label">@lang('action.password.repeat')</label>
>>>>>>> 0209a5d364eaa2acfb6ac10c71a4cef64fbb2ba0
                <div class="col-sm-5">
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
            </div>

            <input type="hidden" name="token" value="{{ $token }}" />

            <div class="form-group">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
<<<<<<< HEAD
                    <button type="submit" class="btn btn-primary">Сбросить</button>
=======
                    <button type="submit" class="btn btn-primary">@lang('action.reset')</button>
>>>>>>> 0209a5d364eaa2acfb6ac10c71a4cef64fbb2ba0
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
