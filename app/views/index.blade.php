@extends('layout')

@section('title')
    @lang('planet.title_index')
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>@lang('planet.title_index')</h1>

        <p>@lang('planet.count_in_database'): {{ $counter }}</p>
    </div>
</div>

<div class="container">
    <?php
        $planets = array_chunk(iterator_to_array($planets), 3);
    ?>
    @foreach($planets as $planetsChunk)
        <div class="row">
            @foreach($planetsChunk as $planet)
                @include('planets/planet_preview')
            @endforeach
        </div>
    @endforeach
</div>
@stop
