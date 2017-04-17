@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Chamadas</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                @if( $errors->all() )
                                    <div class="alert alert-danger">
                                        <strong>Ops!</strong> Algo deu errado. Verifique o erro abaixo.<br><br>
                                        {!! Html::ul($errors->all()) !!}
                                    </div>
                                @endif
                                @if (Session::has('flash_message'))
                                    <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
                                @endif
                            </div>
                        </div>

                        <a href="{{ url('/app/chamadas/create') }}" class="btn btn-success btn-sm" title="Add New Chamada">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar novo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/app/chamadas', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Projeto</th>
                                        <th>Data chamada</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($chamadas)>0)
                                    @foreach($chamadas as $item)
                                        <tr>
                                            <td>{{ $item->projeto->nome }}</td>
                                            <td>{{ $item->datachamada }}</td>
                                            <td>{!! getStatusChamada($item->realizada) !!}</td>
                                            <td>
                                                @if($item->realizada == 1)
                                                <a href="{{ url('/app/chamadas/' . $item->id) }}" title="View Chamada"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                                @else
                                                <a href="{{ url('/app/chamadas/' . $item->id) }}" title="View Chamada"><button class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Fazer chamada</button></a>
                                                @endif
                                                <a href="{{ url('/app/chamadas/' . $item->id . '/edit') }}" title="Edit Chamada"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/app/chamadas', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-xs',
                                                            'title' => 'Delete Chamada',
                                                            'onclick'=>'return confirm("Confirmar exclusão?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                 @else
                                    <tr>
                                        <td colspan="5">Nenhuma chamada realizada.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $chamadas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
