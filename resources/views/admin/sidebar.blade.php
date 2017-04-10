<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Sidebar
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                        Principal
                    </a>
                </li>
                @if( Auth::user()->funcao == 1 )
                    <li role="presentation">
                        <a href="{{ url('/app/projetos') }}">
                            Projetos
                        </a>
                    </li>
                @endif
                <li role="presentation">
                    <a href="{{ url('/app/criancas') }}">
                        Crianças
                    </a>
                </li>
                @if( Auth::user()->funcao == 1 )
                <li role="presentation">
                    <a href="{{ url('/app/usuarios') }}">
                        Tios/Coordenadores
                    </a>
                </li>
                @endif
                <li role="presentation">
                    <a href="{{ url('/app/chamadas') }}">
                        Chamada
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
