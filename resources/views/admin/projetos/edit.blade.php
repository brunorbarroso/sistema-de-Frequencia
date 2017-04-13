@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Projeto #{{ $projeto->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/app/projetos') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($projeto, [
                            'method' => 'PATCH',
                            'url' => ['/app/projetos', $projeto->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.projetos.form', ['submitButtonText' => 'Atualizar'])

                        <input type="hidden" name="state_selected" value="{{ $projeto->estado }}">
                        <input type="hidden" name="city_selected" value="{{ $projeto->cidade_id }}">

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
