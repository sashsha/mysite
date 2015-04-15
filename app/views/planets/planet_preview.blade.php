<div class="col-md-4">
    <h3>{{{ $planet->planet }}}</h3>
    <p>
        {{ date_create($planet->created_at)->format('d.m.Y H:i:s') }}<br />
        @lang('planet.os'): {{ Planet::$oses[$planet->os] }}, @lang('planet.level'): {{ $planet->level }}<br />
        @lang('planet.coordinates'): X {{ $planet->x }}, Y {{ $planet->y }}
    </p>

    <p>{{{ $planet->comment }}}</p>

    <p>
        @lang('planet.added'): <b>
            @if ($planet->author)
                {{ $planet->author->username }}
            @else
                @lang('planet.anonym')
            @endif
        </b><br />
        @lang('planet.views'): {{ $planet->views }}
    </p>

    <p><a class="btn btn-default" href="{{ action('PlanetsController@show', array($planet->id)) }}" role="button">@lang('planet.planet_details') &raquo;</a></p>
</div>
