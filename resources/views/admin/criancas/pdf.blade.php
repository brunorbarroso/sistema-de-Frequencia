@extends('layouts.impressao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Criancas</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome completo</th>
                                        <th>Data de nascimento</th>
                                        <th>Idade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($criancas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><strong>{{ $item->nomecompleto }}</strong></td>
                                        <td>{{ getData($item->datanascimento) }}</td>
                                        <td>{{ getIdade($item->datanascimento) }}</td>
                                        <td><strong>{{ $item->projetos->nome }}</strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
