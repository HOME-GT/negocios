@extends('Web.Layout')

@section('Main')
    <div class="form-signin d-flex align-items-center justify-content-center" id="registro">
        <form class="text-center shadow-sm p-4 bg-white rounded">
            <img class="mb-4" src=" {{ asset("imagenes/logo_home_color.svg") }} " alt="" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Registro</h1>

            <label for="nombres" class="sr-only">Nombre(s)</label>
            <input type="text" id="nombres" name="nombre" class="form-control" placeholder="Nombre (S)" autofocus>

            <label for="apellidos" class="sr-only">Apellidos(s)</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos (s)" >

            <label for="cui" class="sr-only">CUI</label>
            <input type="text" id="cui" name="cui" class="form-control" placeholder="CUI" >

            <label for="correo" class="sr-only">Correo</label>
            <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo" >

            <label for="telefono" class="sr-only">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono">

            <label for="clave" class="sr-only">Contraseña</label>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña">

            <label for="confirmacion_clave" class="sr-only">Confirmación de Contraseña</label>
            <input type="password" id="confirmacion_clave" name="confirmacion_clave" class="form-control" placeholder="Confirmación de contraseña">

            <div class="checkbox text-left">
                <label>
                    <input type="checkbox" name="acuerdos" id="acuerdos"> Aceptar terminos y condiciones
                </label>
            </div>

            <div class="mt-0 text-left mb-2 terminos">
                <a href="#">Leer terminos y condiciones <i class="fa fa-arrow-right"></i></a>
            </div>

            <div class="g-recaptcha" data-sitekey="6LfyGvMUAAAAAFyaVyl3VqZJ9eJsju1PoA0BL3G4"></div>

            <button class="btn btn-dark btn-block mt-2" type="submit">Registro</button>
            <div class="text-left">
                <small>
                    <a href="#"> Iniciar sesión <i class="fa fa-arrow-right"></i></a>
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
            height: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .form-signin form {
            width: 100%;
            max-width: 400px;
        }
        .form-signin .checkbox, .form-signin .terminos {
            font-weight: 400;
            font-size: 0.9rem;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input {
            border-radius: 0px;
        }
        #nombres {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        #confirmacion_clave {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection



@section('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        window.onload = function () {
            new Vue({
                el: '#registro',
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
