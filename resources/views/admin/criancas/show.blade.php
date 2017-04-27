@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Crianca {{ $crianca->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/app/criancas') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/app/criancas/' . $crianca->id . '/edit') }}" title="Edit Crianca"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['app/criancas', $crianca->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Crianca',
                                    'onclick'=>'return confirm("Confirmar exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Cód.</th><td>{{ $crianca->id }}</td>
                                    </tr>
                                    <tr><th> Nome completo </th><td> {{ $crianca->nomecompleto }} </td></tr>
                                    <tr><th> Data de nascimento </th><td> {{ $crianca->datanascimento }} </td></tr>
                                    <tr><th> Idade </th><td> {{ getIdade($crianca->datanascimento) }} </td></tr>
                                    <tr><th> Projeto </th><td> {{ Html::link( URL::to('/app/criancas?project='.$crianca->projetos->id), $crianca->projetos->projeto ) }} </td></tr>
                                    <?php if(isset($crianca->foto) && !empty($crianca->foto)): ?>
                                        <tr><th> Foto </th><td> {!! getImagem($crianca->foto, 100) !!} </td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
