@extends('Web.Layout')

@section('Main')
    <div class="form-signin d-flex align-items-center justify-content-center" id="login">
        <form class="text-center shadow-sm p-4 bg-white rounded">
            <img class="mb-4" src=" {{ asset("imagenes/logo_home_color.svg") }} " alt="" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión</h1>

            <label for="inputEmail" class="sr-only">CUI</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="CUI" autofocus>

            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña">

            <div class="checkbox mb-3 text-left">
                <label>
                    <input type="checkbox" value="remember-me"> Recordarme
                </label>
            </div>
            <button class="btn btn-lg btn-dark btn-block" type="submit">Ingresar</button>
            <div class="text-left">
                <small>
                    <a href="#"> Crear cuenta <i class="fa fa-arrow-right"></i> </a>
                </small>
            </div>
        </form>
    </div>
@endsection

@section('css')
    <style>
        body{
            background-position: center;
            background-size: cover;
        }
        .form-signin {
        height: calc(100vh - 56px);
        }

        .form-signin form {
            width: 100%;
            max-width: 350px;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection



@section('js')
    <script>
        window.onload = function () {
            new Vue({
                el: '#login',
                data: {
                    ACCESS_KEY: "Vgea-MX0AsKvNEvF1PEjTLAt2w3wXLSpoJKRF5UrqJ8",
                    URL: "https://api.unsplash.com/photos/random",
                    URLPHOTO: "https://api.unsplash.com/photos/",
                    width: window.screen.width,
                    height: window.screen.height,
                    dpr: window.devicePixelRatio
                },
                methods: {
                    loadPhoto(){
                        axios.get(this.URL, {
                            params:{
                                query: 'guatemala',
                                client_id: this.ACCESS_KEY,
                                featured: true,
                                orientation: 'landscape',
                            }
                        }).then(response=>{
                            // document.body.style.backgroundImage = `url('${response.data.urls.raw}&w=${this.width}&h=${this.height}&dpr=${this.dpr}')`;
                            document.body.style.backgroundImage = `url('${response.data.urls.regular}')`;

                        });
                    }
                },
                mounted() {
                    this.loadPhoto();
                },
            })
        }
    </script>
@endsection
