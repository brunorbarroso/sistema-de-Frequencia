@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Projetos</div>
                    <div class="panel-body">
                        <a href="{{ url('/app/projetos/create') }}" class="btn btn-success btn-sm" title="Add New Projeto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar novo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/app/projetos', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>Nome</th>
                                        <th>Estado</th>
                                        <th>Cidade</th>
                                        <th>Bairro</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($projetos)>0)
                                    @foreach($projetos as $item)
                                        <tr>
                                            <td>{{ $item->projeto }}</td>
                                            <td>{{ $item->estado }}</td>
                                            <td>{{ $item->cidades->nome }}</td>
                                            <td>{{ $item->bairro }}</td>
                                            <td>
                                                <a href="{{ url('/app/projetos/' . $item->id) }}" title="View Projeto"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="{{ url('/app/projetos/' . $item->id . '/edit') }}" title="Edit Projeto"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/app/projetos', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger',
                                                            'title' => 'Delete Projeto',
                                                            'onclick'=>'return confirm("Confirmar exclusão?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                 @else
                                    <tr>
                                        <td colspan="5">Nenhum projeto cadastrado.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $projetos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
