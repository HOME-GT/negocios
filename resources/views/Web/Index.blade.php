<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Portal de negocios para guatemala por COVID-19">
        <meta name="author" content="http://home.com.gt/">
        <title>NegociosGT</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset("css/index.css") }}">
    </head>
    <body class="text-center">
        <div id="home" class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
                <header class="masthead mb-auto">
                    <div class="inner">
                        <h3 class="masthead-brand">NegociosGT</h3>
                        <nav class="nav nav-masthead justify-content-center">
                            <a class="nav-link" href=" {{ route("web.comofunciona") }} ">¿Cómo funciona?</a>
                            <a class="nav-link" href="#">Nuevo Negocio</a>
                            @if(!Auth::check())
                                <a class="nav-link" href="{{ route("login") }}">Login</a>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Wesner Ché
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuarioDropdown">
                                        <a class="dropdown-item" href="#">Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route("logout") }}">Cerrar sesión</a>
                                    </div>
                                </li>
                            @endif
                        </nav>
                    </div>
                </header>

                <main role="main" class="inner cover ">
                    <form action=" {{ route("web.resultados") }} " method="GET">
                        <div class="form-row">
                             <div class="col-md-12 text-left">
                                  <div class="input-group">
                                       <input name="search" id="search" type="search" class="form-control form-control-lg" placeholder="¿Qué negocio estas buscando?" autofocus>
                                  </div>
                             </div>
                        </div>
                   </form>
                </main>

                <footer class="mt-auto p-2 bg-dark">
                    <div class="inner">
                    <div class="row text-white">
                        <div class="col-md-6 text-center text-md-left d-flex align-items-center justify-content-center justify-content-md-start justify-content-lg-start justify-content-lx-start">
                            <a href="https://home.com.gt/" target="_blank"> <img src=" {{ asset("imagenes/Logo_Color_White.svg") }} " width="90" alt="Logo Home"> </a>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                                <div> @{{ titlePhoto }} </div>
                                <div>
                                    <span> <b>Fotos por:</b> <a href="https://unsplash.com/" target="_blank" class="text-primary"> Unsplash </a> </span> |
                                    <span> <b>Fotográfo:</b> <a v-bind:href="hrefUserPhoto" target="_blank" class="text-primary"> @{{ userPhoto }} </a> </span>
                                </div>
                        </div>
                    </div>
                    </div>
                </footer>
        </div>

        {{-- scripts --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="{{ asset("js/index.js") }}"></script>
    </body>
</html>
