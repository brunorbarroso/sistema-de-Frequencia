@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-block">
                                <h4 class="card-title">Crianças <span class="glyphicon glyphicon-user"></span></h4>
                                <p class="card-text">Área gerencial das crianças.</p>
                                <a href="{{ URL::to('/app/criancas') }}" class="btn btn-primary">Acessar área</a>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-block">
                                <h4 class="card-title">Projetos <span class="glyphicon glyphicon-home"></span></h4>
                                <p class="card-text">Área gerencial das crianças.</p>
                                <a href="{{ URL::to('/app/criancas') }}" class="btn btn-primary">Acessar área</a>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-block">
                                <h4 class="card-title">Chamada <span class="glyphicon glyphicon-check"></span></h4>
                                <p class="card-text">Área gerencial das crianças.</p>
                                <a href="{{ URL::to('/app/criancas') }}" class="btn btn-primary">Acessar área</a>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-block">
                                <h4 class="card-title">Tios/Coordenação <span class="glyphicon glyphicon-heart"></span></h4>
                                <p class="card-text">Área gerencial das crianças.</p>
                                <a href="{{ URL::to('/app/criancas') }}" class="btn btn-primary">Acessar área</a>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
