@extends('layout')

@section('title')
    Ошибка
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>@lang('messages.error_code', array('errorCode' => $error['code']))</h1>
            <p>{{ $error['message'] }}</p>
            <div>
                <a href="javascript:history.go(-1)">« @lang('action.back')</a> /
                <a href="{{ Config::get('app.url') }}">@lang('action.home') »</a>
            </div>
        </div>
    </div>

@endsection