@extends('layout')

@section('title')
    @lang('planet.title_show', array('planetName' => $planet->planet))
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h2>
            @lang('planet.title_show', array('planetName' => $planet->planet))
        </h2>
    </div>
</div>

<div class="container">
    <table class="table table-striped">
        <tr>
            <td>@lang('planet.sector'):</td>
            <td>{{ Planet::$sectors[$planet->sector] }}</td>
        </tr>
        <tr>
            <td>@lang('planet.level'):</td>
            <td>{{ $planet->level }}</td>
        </tr>
        <tr>
            <td>@lang('planet.star'):</td>
            <td>{{{ $planet->star }}}</td>
        </tr>
        <tr>
            <td>@lang('planet.system'):</td>
            <td>{{{ $planet->system }}}</td>
        </tr>
        <tr>
            <td>@lang('planet.name'):</td>
            <td>{{{ $planet->planet }}}</td>
        </tr>
        <tr>
            <td>@lang('planet.biome'):</td>
            <td>{{ Planet::$bioms[$planet->biome] }}</td>
        </tr>
        <tr>
            <td>@lang('planet.coordinates'):</td>
            <td>
                <table>
                    <tr>
                        <td>X:</td>
                        <td>{{ $planet->x }}</td>
                    </tr>
                    <tr>
                        <td>Y:</td>
                        <td>{{ $planet->y }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>@lang('planet.version_game'):</td>
            <td>{{ Planet::$versions[$planet->version] }}</td>
        </tr>
        <tr>
            <td>@lang('planet.os'):</td>
            <td>{{ Planet::$oses[$planet->os] }}</td>
        </tr>
        <tr>
            <td>@lang('planet.views'):</td>
            <td>{{ $planet->views }}</td>
        </tr>
        <tr>
            <td>@lang('planet.comment'):</td>
            <td>{{ $planet->comment }}</td>
        </tr>
    </table>
    @if(Auth::check() && $planet->author == Auth::user())
        <div class="button-actions">
            {{ Form::open(array('url' => action('PlanetsController@edit', $planet->id), 'method' => 'get', 'role' => 'form', 'class' => 'form-group')) }}
            {{ Form::submit(Lang::get('action.edit'), array('class' => 'btn btn-warning'))}}
            {{ Form::close() }}

            {{ Form::open(array('url' => action('PlanetsController@destroy', $planet->id), 'method' => 'delete', 'role' => 'form', 'class' => 'form-group', 'id' => 'deletePlanet', 'data-question' => Lang::get('messages.want_delete_planet'))) }}
            {{ Form::submit(Lang::get('action.delete'), array('class' => 'btn btn-danger'))}}
            {{ Form::close() }}
        </div>
    @endif
</div>
@stop
