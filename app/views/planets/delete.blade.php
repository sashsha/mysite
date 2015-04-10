@extends('layout')

@section('title')
    Планета удалена
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Congratulations, planet "{{ $planetName}}" deleted!</h1>
            <div>
                <a href="{{{ URL::action('PlanetsController@getAdd') }}}">← Create new planet</a> /
                <a href="{{ Config::get('app.url') }}">Go Home →</a>
            </div>
        </div>
    </div>

@endsection