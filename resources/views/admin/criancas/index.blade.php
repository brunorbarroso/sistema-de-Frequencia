@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Criancas</div>
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

                        <a href="{{ url('/app/criancas/create') }}" class="btn btn-success btn-sm" title="Add New Crianca">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar novo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/app/criancas', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <?php if(isset($_GET['search'])) : ?>
                            <input type="hidden" name="search" value="{{$_GET['search']}}">
                            <?php endif; ?>
                            <?php if(isset($_GET['project'])) : ?>
                                {{ Form::select('project', $projetos, $_GET['project'], ['class' => 'form-control']) }}
                            <?php else: ?>
                                {{ Form::select('project', $projetos, null, ['class' => 'form-control']) }}
                            <?php endif; ?>
                            
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'GET', 'url' => '/app/criancas', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <?php if(isset($_GET['project'])) : ?>
                                <input type="hidden" name="project" value="{{$_GET['project']}}">
                            <?php endif; ?>
                            <?php if(isset($_GET['search']) && !empty($_GET['search'])) : ?>
                            <input type="text" class="form-control" name="search" value="{{$_GET['search']}}">
                            <?php else: ?>
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <?php endif; ?>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method'=>'GET',
                            'url' => ['app/imprimir/lista'],
                            'style' => 'display:inline'
                        ]) !!}
                        <?php $label = ""; ?>
                        <?php if(empty($_GET['project']) && empty($_GET['search'])): ?>
                            <?php $label = "todos"; ?>
                        <?php elseif(!empty($_GET['project']) && !empty($_GET['search'])): ?>
                            <?php $label = "por pesquisa"; ?>
                        <?php elseif(isset($_GET['project']) && !empty($_GET['project'])): ?>
                            <?php $label = "por projeto"; ?>
                        <?php elseif(isset($_GET['search']) && !empty($_GET['search'])): ?>
                             <?php $label = "por pesquisa"; ?>
                        <?php endif; ?>
                        
                            {!! Form::button('<i class="fa fa-print" aria-hidden="true"></i> Imprimir <span class="label label-default">'.$label.'</span>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-warning btn-sm',
                                    'title' => 'Imprimir',
                                    'onclick'=>'return confirm("Deseja imprimir?")'
                            )) !!}
                            
                            <?php if(isset($_GET['project'])) : ?>
                            <input type="hidden" name="project" value="{{$_GET['project']}}">
                            <?php endif; ?>

                            <?php if(isset($_GET['search'])) : ?>
                            <input type="hidden" name="search" value="{{$_GET['search']}}">
                            <?php endif; ?>
                            
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome completo</th>
                                        <th>Data de nascimento</th>
                                        <th>Idade</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($criancas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nomecompleto }}</td>
                                        <td>{{ getData($item->datanascimento) }}</td>
                                        <td>{{ getIdade($item->datanascimento) }}</td>
                                        <td>{{ HTML::link( URL::to('/app/criancas?project='.$item->projetos->id), $item->projetos->nome ) }}</td>
                                        <td>
                                            <a href="{{ url('/app/criancas/' . $item->id) }}" title="View Crianca"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/app/criancas/' . $item->id . '/edit') }}" title="Edit Crianca"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/app/criancas', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Crianca',
                                                        'onclick'=>'return confirm("Confirmar exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $criancas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
