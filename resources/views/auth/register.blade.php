@extends('Web.Layout')

@section('Main')
    <div class="form-signin d-flex align-items-center justify-content-center" id="registro">
        <form class="text-center shadow-sm p-4 bg-white rounded" action="{{ route("registro.post") }}" method="POST">
            @csrf

            <img class="mb-4" src=" {{ asset("imagenes/logo_home_color.svg") }} " alt="" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Registro</h1>

            @if(session()->has('success'))
                @if(session('success'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success py-3">
                                    <i class="mdi mdi-checkbox-marked"></i> Operación Exitosa!</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger py-3">
                                    <i class="mdi mdi-close-box"></i> {{ session("message") }} </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <label for="nombres" class="sr-only">Nombre(s) <span class="text-danger">*</span> </label>
            <input type="text" id="nombres" name="nombres" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" value="{{ old('nombres') }}" placeholder="Nombre (S)*" autofocus>
            @if ($errors->has('nombres'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('nombres') }}</span>
                </span>
            @endif

            <label for="apellidos" class="sr-only">Apellidos(s)</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ old('apellidos') }}"  placeholder="Apellidos (s)" >
            @if ($errors->has('apellidos'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('apellidos') }}</span>
                </span>
            @endif

            <label for="cui" class="sr-only">CUI <span class="text-danger">*</span></label>
            <input type="text" id="cui" name="cui" class="form-control {{ $errors->has('cui') ? ' is-invalid' : '' }}" value="{{ old('cui') }}"  placeholder="CUI*" >
            @if ($errors->has('cui'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('cui') }}</span>
                </span>
            @endif

            <label for="correo" class="sr-only">Correo <span class="text-danger">*</span></label>
            <input type="text" id="correo" name="correo" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ old('correo') }}"  placeholder="Correo*" >
            @if ($errors->has('correo'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('correo') }}</span>
                </span>
            @endif

            <label for="telefono" class="sr-only">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}"  placeholder="Teléfono">
            @if ($errors->has('telefono'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('telefono') }}</span>
                </span>
            @endif

            <label for="clave" class="sr-only">Contraseña <span class="text-danger">*</span></label>
            <input type="password" id="clave" name="clave" class="form-control {{ $errors->has('clave') ? ' is-invalid' : '' }}" value="{{ old('clave') }}"  placeholder="Contraseña*">
            @if ($errors->has('clave'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('clave') }}</span>
                </span>
            @endif

            <label for="clave_confirmacion" class="sr-only">Confirmación de Contraseña <span class="text-danger">*</span></label>
            <input type="password" id="clave_confirmacion" name="clave_confirmacion" class="form-control {{ $errors->has('clave_confirmacion') ? ' is-invalid' : '' }}" value="{{ old('clave_confirmacion') }}"  placeholder="Confirmación de contraseña*">
            @if ($errors->has('clave_confirmacion'))
                <span class="invalid-feedback text-left" role="alert">
                    <span>{{ $errors->first('clave_confirmacion') }}</span>
                </span>
            @endif

            <div class="checkbox text-left">
                <label>
                    <input type="checkbox" name="acuerdos" id="acuerdos" {{ old('acuerdos') ? 'checked' : '' }}> Aceptar terminos y condiciones <span class="text-danger">*</span>
                </label>
                @if ($errors->has('acuerdos'))
                <div class="text-danger text-left">
                    <span>{{ $errors->first('acuerdos') }}</span>
                </div>
            @endif
            </div>

            <div class="mt-0 text-left mb-2 terminos">
                <a href="{{ route("acuerdos.get") }}" target="_blank">Leer terminos y condiciones <i class="fa fa-arrow-right"></i></a>
            </div>

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
