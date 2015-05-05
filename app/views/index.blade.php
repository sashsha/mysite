@extends('layout')

@section('title')
    @lang('planet.title_index')
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>@lang('planet.title_index')</h1>

        <p>@lang('planet.count_in_database'): {{ $planets->getTotal() }}</p>
    </div>
</div>

<div class="container">
    @foreach(array_chunk($planets->getCollection()->all(), 3) as $planetsChunk)
        <div class="row">
            @foreach($planetsChunk as $planet)
                @include('planets/planet_preview')
            @endforeach
        </div>
    @endforeach
    {{$planets->links()}}
</div>
@stop
