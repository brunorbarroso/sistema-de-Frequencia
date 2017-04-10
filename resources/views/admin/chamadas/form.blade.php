<div class="form-group {{ $errors->has('datachamada') ? 'has-error' : ''}}">
    {!! Form::label('datachamada', 'Data chamada', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('datachamada', null, ['class' => 'form-control']) !!}
        {!! $errors->first('datachamada', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('projeto_id') ? 'has-error' : ''}}">
    {!! Form::label('projeto', 'Projeto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('projeto_id', $projetos, null, ['class' => 'form-control']) }}
        {!! $errors->first('projeto_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Criar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
