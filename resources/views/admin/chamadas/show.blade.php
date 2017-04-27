@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Chamada {{ $chamada->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/app/chamadas') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/app/chamadas/' . $chamada->id . '/edit') }}" title="Edit Chamada"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['app/chamadas', $chamada->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Chamada',
                                    'onclick'=>'return confirm("Confirmar exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $chamada->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Data chamada </th><td> {{ $chamada->datachamada }} </td>
                                    </tr>
                                    <tr>
                                        <th> Projeto </th><td> {{ $chamada->projeto->nome }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">                          
                            <table class="table table-borderless">
                                <caption><h4>Lista de crianças</h4></caption>
                                <tbody>
                                @if(count($criancas)>0)
                                    {!! Form::open([
                                        'method'=>'PUT',
                                        'url' => ['app/fazer_chamda/chamada', $chamada->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    <tr>
                                        <th>Cód.</th>
                                        <th>Criança</th>
                                        <th>Total de faltas</th>
                                        <th>Presença</th>
                                    </tr>                          
                                    @foreach($criancas as $crianca)
                                        <tr>     
                                            <td>{{$crianca->id}}</td>
                                            <td>{{$crianca->nomecompleto}}</td>
                                            <td>{{ getTotalFaltas($crianca->id) }}</td>
                                            <input type="hidden" name="projeto_id[]" value="{{$chamada->projeto->id}}">
                                            <input type="hidden" name="crianca_id[]" value="{{$crianca->id}}">
                                            <td><input type="checkbox" name="presenca[{{$crianca->id}}][]" {{ criancaIsChecked($presencas, $crianca->id) }}></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                    <td colspan="3">
                                    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> <strong>Salvar presença</strong>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-info btn',
                                                'title' => 'Confirmar lista de presença',
                                                'style' => 'float: right',
                                                'onclick'=>'return confirm("Confirmar listagem?")'
                                        ))!!}
                                    </td>
                                        
                                    </tr>
                                @else
                                    <tr>
                                    <td colspan="3">Nenhuma criança na lista. Adicione clicando <a href="{{ URL::to('app/chamadas/'.$chamada->id.'/fazer_chamada') }}"><strong>AQUI</strong>!</a></td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
