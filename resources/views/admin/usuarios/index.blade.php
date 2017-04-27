@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        <a href="{{ url('/app/usuarios/create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar novo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/app/usuarios', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th><th>Email</th><th>Funcao</th><th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ getFuncao($item->funcao) }}</td>
                                        <td>
                                            <a href="{{ url('/app/usuarios/' . $item->uuid) }}" title="View User"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/app/usuarios/' . $item->uuid . '/edit') }}" title="Edit User"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/app/usuarios', $item->uuid],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirmar exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
