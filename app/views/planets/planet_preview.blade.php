<div class="col-md-4">
    <h3>{{{ $planet->planet }}}</h3>
    <p>
        {{ date_create($planet->created_at)->format('d.m.Y H:i:s') }}<br />
        OS: {{ Planet::$oses[$planet->os] }}, Уровень: {{ $planet->level }}<br />
        Координаты: X {{ $planet->x }}, Y {{ $planet->y }}
    </p>

    <p>{{{ $planet->comment }}}</p>

    <p>
        @lang('planet.title_edit'): <b>
            @if ($planet->author)
                {{ $planet->author->username }}
            @else
                Аноним
            @endif
        </b><br />
        @lang('planet.views'): {{ $planet->views }}
    </p>

    <p><a class="btn btn-default" href="{{ action('PlanetsController@show', array($planet->id)) }}" role="button">Детали планеты &raquo;</a></p>
</div>
