@extends('layout')

@section('title')
    Ошибка
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Oops, {{ $error['code'] }}!</h1>
            <p>{{ $error['message'] }}</p>
            <div>
                <a href="javascript:history.go(-1)">« Go Back</a> /
                <a href="{{ Config::get('app.url') }}">Go Home »</a>
            </div>
        </div>
    </div>

@endsection