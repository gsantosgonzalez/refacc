<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maldonado') }}</title>

    <!-- Styles -->
    @yield('estilos')
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('jquery/jqueryui/jquery-ui.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/car.png') }}" width = "28px" height = "28px">
                        
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="btn btn-link" href="{{ url('/login') }}">Entrar</a></li>
                            <li><a class="btn btn-link" href="{{ url('/register') }}">Registrar</a></li>
                        @else
                            <li><a class="btn btn-link" href="{{ url('/notificacion') }}"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
                            <li><a class="btn btn-link" href="{{ url('/articulo') }}">Articulos</a></li>
                            <li><a class="btn btn-link" href="{{ url('/venta') }}">Ventas</a></li>
                            <li><a class="btn btn-link" href="{{ url('/compra') }}">Compras</a></li>
                            <li><a class="btn btn-link" href="{{ url('/cliente') }}">Clientes</a></li>
                            <li><a class="btn btn-link" href="{{ url('/proveedor') }}">Proveedores</a></li>    
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-link" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
                                    {{ strtoupper(Auth::user()->name) }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @include('flash::message')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src = "/jquery/jquery-3.1.1.js"></script>
    <script src="/jquery/jqueryui/jquery-ui.js"></script>
    <script src=" {{asset('plugins/chosen/chosen.jquery.js')}} "></script>
    <script src = "{{ asset('bootstrap/js/bootstrap.js') }}"></script>

    @yield('script')
    <script>
        //Javascript
        $(function()
        {
            $( "#term" ).autocomplete({
                source: "{{ route('venta.autocomplete') }}",
                minLength: 3,
                select: function(event, ui){
                    $('#id_articulo').val(ui.item.id);
                }
            });
        });
        $(function()
        {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</body>
</html>
