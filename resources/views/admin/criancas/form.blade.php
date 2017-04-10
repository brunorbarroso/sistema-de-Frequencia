<div class="form-group {{ $errors->has('nomecompleto') ? 'has-error' : ''}}">
    {!! Form::label('nomecompleto', 'Nome completo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomecompleto', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomecompleto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('datanascimento') ? 'has-error' : ''}}">
    {!! Form::label('datanascimento', 'Data nascimento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('datanascimento', null, ['class' => 'form-control']) !!}
        {!! $errors->first('datanascimento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('idade') ? 'has-error' : ''}}">
    {!! Form::label('idade', 'Idade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('idade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('idade', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mae') ? 'has-error' : ''}}">
    {!! Form::label('mae', 'Mae', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mae', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mae', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('contato') ? 'has-error' : ''}}">
    {!! Form::label('contato', 'Contato', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('contato', null, ['class' => 'form-control']) !!}
        {!! $errors->first('contato', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
    {!! Form::label('sexo', 'Sexo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('sexo', ['Masculino', ' Feminino'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('sexo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('projeto_id') ? 'has-error' : ''}}">
    {!! Form::label('projeto', 'Projeto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('projeto', $projetos, null, ['class' => 'form-control']) }}
        {!! $errors->first('projeto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
