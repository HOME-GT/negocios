<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Resultados de las busquedas en el portal de negocios para guatemala por COVID-19">
        <meta name="author" content="http://home.com.gt/">
        <title>NegociosGT</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset("css/main.css") }}">
        @yield('css')
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm">
            <a class="navbar-brand mr-auto mr-lg-0" href="#">NegociosGT</a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarNegocios">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route("web.home") }} ">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route("web.comofunciona") }} ">¿Cómo funciona?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route("app.negocio.nuevo.get") }} ">Nuevo Negocio</a>
                    </li>

                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("login") }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("registro.get") }}">Registro</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->usu_nombres }} {{ Auth::user()->usu_apellidos }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuarioDropdown">
                                <a class="dropdown-item" href="#">Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route("logout") }}">Cerrar sesión</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        @yield('Nav')

        <main role="main" class="container">
            @yield('Main')
        </main>


        {{-- scripts --}}
        {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://kit.fontawesome.com/d2730725e8.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src=" {{ asset("js/main.js") }} "></script>
        @yield('js')
    </body>
</html>
