@extends('layout')

@section('title')
    @lang('planet.title_delete')
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>@lang('planet.deleted_planet', array('planetName' => $planetName))</h1>
            <div>
                <a href="{{{ URL::action('PlanetsController@create') }}}">← @lang('action.create_new_planet')</a> /
                <a href="{{ Config::get('app.url') }}">@lang('action.home') →</a>
            </div>
        </div>
    </div>

@endsection