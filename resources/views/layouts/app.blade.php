<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ação Social Lumen</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body class="wrapper">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Ação Social Lumen
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Sistema</a></li>
                </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Entrar</a></li>
                        <li><a href="{{ url('/register') }}">Cadastrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/app/profile') }}"><i class="fa fa-btn fa-user"></i>Minha conta</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/light-bootstrap-dashboard.js') }}"></script>
    <script src="/vendor/artesaos/cidades/js/scripts.js"></script>
    <script src="{{ asset('assets/js/jquery-mask.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete-img').on('click', function(){
                $('.item-image').each(function(idx, item){
                    $(item).remove()
                })
                $('input[name=foto_name]').val("")
            })

            $('.phone_with_ddd').mask('(00) 0000-0000');
            $('#uf').ufs({
                onChange: function(uf){
                    $('#city').cidades({uf: uf});      
                }
            })
            setTimeout(function(){ 
                state = $("input[name='state_selected']").val()
                city  = $("input[name='city_selected']").val()
                $("select[name='estado'] option" ).each(function(idx, item) {
                    if( $(item).val() == state ) {
                        $("select[name='estado']").val(item.value)
                        $('#city').cidades({uf: item.value});
                    }
                });
                setTimeout(function(){
                    $("select[name='cidade'] option" ).each(function(idx, item) {
                        if( $(item).val() == city ) {
                            $("select[name='cidade']").val(item.value)
                        }
                    });
                }, 1000)
            }, 500);
        });
    </script>

</body>
<footer>
    <div class="container">
        <div class="row">        
            Sistema desenvolvido com muito &hearts; por <a href="http://fb.com/brunobarrosor">Bruno Barroso </a>(namorado da Mari)
        </div>
        <div class="row">
            © Copyright 2017
        </div>
    </div>
</footer>
</html>
