@extends('layout')

@section('title')
    @lang('action.login')
@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
<div class="container">
    @if (Session::has('alert'))
        <div class="alert alert-danger">
            <p>{{ Session::get('alert') }}
        </div>
    @endif

    <form class="form-signin" role="form" action="{{ action('UsersController@postLogin') }}" method="post">
        <h2 class="form-signin-heading">@lang('user.data')</h2>
        <input type="text" class="form-control" placeholder="@lang('user.email_or_name')" name="username" required autofocus />
        <input type="password" class="form-control" placeholder="@lang('user.password')" name="password" required />
        <label class="checkbox">
            <input type="checkbox" name="remember" value="remember-me"> @lang('user.remember_me')
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">@lang('action.login')</button>

        <a href="/password/remind">@lang('action.password.forgot')?</a><br />
        <a href="/users/register">@lang('action.register')</a>
    </form>
</div>
@stop
