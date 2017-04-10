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
                                <div class="header">
                                    <h4 class="title">Crianças <span class="fa fa-child"></span></h4>
                                </div>
                                <div class="content">
                                    <p class="card-text">Área gerencial das crianças.</p>
                                    <a href="{{ URL::to('/app/criancas') }}" class="btn btn-default">Acessar área</a>
                                </div>
                            </div>
                        </div>
                        @if( Auth::user()->funcao == 1 )
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Projetos <span class="glyphicon glyphicon-home"></span></h4>
                                </div>
                                <div class="content">
                                    <p class="card-text">Área gerencial dos projetos.</p>
                                    <a href="{{ URL::to('/app/projetos') }}" class="btn btn-default">Acessar área</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Chamadas <span class="fa fa-btn fa-th-list"></span></h4>
                                </div>
                                <div class="content">
                                    <p class="card-text">Área gerencial das chamadas.</p>
                                    <a href="{{ URL::to('/app/chamadas') }}" class="btn btn-default">Acessar área</a>
                                </div>
                            </div>
                        </div>
                        @if( Auth::user()->funcao == 1 )
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Tios/Coordenadores <span class="fa fa-users"></span></h4>
                                </div>
                                <div class="content">
                                    <p class="card-text">Área gerencial dos tios e coordenadores.</p>
                                    <a href="{{ URL::to('/app/usuarios') }}" class="btn btn-default">Acessar área</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
