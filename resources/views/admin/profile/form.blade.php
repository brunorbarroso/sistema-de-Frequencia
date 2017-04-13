<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if( !Auth::guest() && Auth::user()->funcao == 1 )
    <div class="form-group {{ $errors->has('funcao') ? 'has-error' : ''}}">
        {!! Form::label('funcao', 'Funcao', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('funcao', ['Tio', ' Coordenador(a)'], null, ['class' => 'form-control']) !!}
            {!! $errors->first('funcao', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Criar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
