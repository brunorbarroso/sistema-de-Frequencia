@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Seja bem-vindo!</div>
                    <div class="panel-body">
                    <div class="col-md-6">    
                        <div class="header">
                            <h4 class="title">Esse sistema foi criado para gerenciar os projetos sociais da Obra Lumen de Evangelização <span class="glyphicon glyphicon-home"></span></h4>
                        </div>
                        <div class="content">
                            <p class="card-text">Quer ser tio e nos ajudar com o projeto social? Entra em contato conosco pelo telefone: (85) 9.8684-2880</p>
                            <p class="card-text">Sempre quis ajudar e não sabe como? Doe qualquer valor, nossas crianças vão acolher suas "moedinhas" de coração. :D</p>
                            <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                            <form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
                            <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                            <input type="hidden" name="currency" value="BRL" />
                            <input type="hidden" name="receiverEmail" value="brunobinfo@gmail.com" />
                            <input type="hidden" name="iot" value="button" />
                            <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/184x42-doar-laranja-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                            </form>
                            <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
