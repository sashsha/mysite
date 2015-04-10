<div class="form-group">
    <label for="sector" class="col-sm-2 control-label">Сектор</label>
    <div class="col-sm-5">
        {{ Form::select('sector', Planet::$sectors, $planet ? $planet->sector : null , array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="level" class="col-sm-2 control-label">Уровень</label>
    <div class="col-sm-5">
        {{ Form::text('level', $planet ? $planet->level : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="star" class="col-sm-2 control-label">Звезда</label>
    <div class="col-sm-5">
        {{ Form::text('star', $planet ? $planet->star : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="system" class="col-sm-2 control-label">Система</label>
    <div class="col-sm-5">
        {{ Form::text('system', $planet ? $planet->system : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="planet" class="col-sm-2 control-label">Планета</label>
    <div class="col-sm-5">
        {{ Form::text('planet', $planet ? $planet->planet : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="biome" class="col-sm-2 control-label">Биом</label>
    <div class="col-sm-5">
        {{ Form::select('biome', Planet::$bioms, $planet ? $planet->biome : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="x" class="col-sm-2 control-label">Координата X</label>
    <div class="col-sm-5">
        {{ Form::text('x', $planet ? $planet->x : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="y" class="col-sm-2 control-label">Координата Y</label>
    <div class="col-sm-5">
        {{ Form::text('y', $planet ? $planet->y : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="version" class="col-sm-2 control-label">Версия игры</label>
    <div class="col-sm-5">
        {{ Form::select('version', Planet::$versions, $planet ? $planet->version : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="os" class="col-sm-2 control-label">OS (операционная система)</label>
    <div class="col-sm-5">
        {{ Form::select('os', Planet::$oses, $planet ? $planet->os : null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="comment" class="col-sm-2 control-label">Комментарий</label>
    <div class="col-sm-5">
        {{ Form::textarea('comment', $planet ? $planet->comment : null, array('class' => 'form-control bbeditor')) }}<br />
    </div>
</div>
