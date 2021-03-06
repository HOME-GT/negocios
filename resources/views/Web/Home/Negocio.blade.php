@extends('Web.Layout', ['title' => $negocio->neg_nombre_completo, 'description'=> $negocio->neg_nombre_completo.' - '.$negocio->neg_descripcion ])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded">
        <div class="p-3">
            <div class="row">
                @if (empty($negocio->neg_logo))
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <h1 class="d-inline text-title">  {{ $negocio->neg_nombre_completo }} </h1>
                    </div>
                @else
                    <div class="col-md-12 py-4 text-center">
                        <img class="" src=" {{ asset("imagenes/negocios/".$negocio->neg_logo) }} " alt="Logo - {{ $negocio->neg_nombre_corto }}" width="300">
                        <h6 class="text-title-img">  {{ $negocio->neg_nombre_completo }} </h6>
                    </div>
                @endif
            </div>
        </div>

        {{-- ---------------------------------------------------- --}}
        {{-- Información general --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infogeneral">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infogeneralOne"  data-toggle="collapse">
                INFORMACIÓN GENERAL <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infogeneral" id="infogeneralOne">
                <div>
                    <div class="border-bottom">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Nombre</div>
                        <p>{{ $negocio->neg_nombre_completo }} | {{ $negocio->neg_nombre_corto }}</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Sobre el negocio</div>
                        <p>{{ $negocio->neg_descripcion }}</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Ubicación</div>
                        <p> {{ $negocio->neg_nombre_completo }} : {{ $negocio->neg_nombre_completo }} : {{ $negocio->neg_ubicacion }}</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Categoría</div>
                        <p> {{ $negocio->neg_nombre_completo }} </p>
                    </div>
                    <div class="pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-truck"></i> Servicio a domicilio</div>
                        <p> {!! $negocio->neg_servicio_dominicio ? "<i class='fa fa-check text-success'></i> SÍ posee servicio." : "<i class='fa fa-times text-danger'></i> NO posee servicio." !!} </p>
                    </div>
                </div>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- Información de contacto --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infocontacto">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infocontactoOne"  data-toggle="collapse">
                INFORMACIÓN DE CONTACTO <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infocontacto" id="infocontactoOne">
                <div class="row">
                    <div class="col-md-6">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-phone"></i> Telefonos</div>
                            @if (!empty($negocio->contacto->con_telefono1))
                                <p class="mb-0 pb-0"> <a target="_blank" href="tel:+502 {{ $negocio->contacto->con_telefono1 }} ">+502 {{ $negocio->contacto->con_telefono1 }}</a> </p>
                            @endif
                            @if (!empty($negocio->contacto->con_telefono2))
                                <p class="mb-0 pb-0"> <a target="_blank" href="tel:+502 {{ $negocio->contacto->con_telefono2 }} ">+502 {{ $negocio->contacto->con_telefono2 }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-whatsapp"></i> WhatsApp</div>
                            @if (!empty($negocio->contacto->con_whatsapp))
                                <p> <a target="_blank" href="https://wa.me/502{{$negocio->contacto->con_whatsapp}}">+502 {{ $negocio->contacto->con_whatsapp }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-envelope"></i> Correo1</div>
                            @if (!empty($negocio->contacto->con_correo1))
                                <p> <a target="_blank" href="mailto:{{$negocio->contacto->con_correo1}}">{{ $negocio->contacto->con_correo1 }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-envelope"></i> Correo2</div>
                            @if (!empty($negocio->contacto->con_correo2))
                                <p> <a target="_blank" href="mailto:{{$negocio->contacto->con_correo2}}">{{ $negocio->contacto->con_correo2 }}</a> </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-web"></i> Página Web</div>
                            @if (!empty($negocio->contacto->con_pagina))
                                <p> <a target="_blank" href="{{$negocio->contacto->con_pagina}}">{{ $negocio->contacto->con_pagina }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-facebook"></i> Facebook</div>
                            @if (!empty($negocio->contacto->con_facebook))
                                <p> <a target="_blank" href="{{$negocio->contacto->con_facebook}}">{{ $negocio->contacto->con_facebook }}</a> </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-location-arrow"></i> Dirección</div>
                            @if (!empty($negocio->contacto->con_direccion))
                                <p> {{ $negocio->contacto->con_direccion }} </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-map-marked-alt"></i> Google Maps</div>
                            <div class="pt-2">
                                {{-- @if (!empty($negocio->contacto->con_google_maps))
                                    <iframe src="{{ $negocio->contacto->con_google_maps }}" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                @endif --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31204.968841382324!2d-90.50910972950643!3d14.640281742242724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4207b3704ab2d4bd!2sSupermercado%20La%20Torre!5e0!3m2!1sen!2sgt!4v1590003010290!5m2!1sen!2sgt" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- imagenes --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infoimagenes">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infoimagenesOne"  data-toggle="collapse">
                Imágenes <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show" data-parent="#infoimagenes" id="infoimagenesOne">

                @if (count($negocio->imagenes) > 0)
                        <div class="galleria">
                            @foreach ($negocio->imagenes as $img)
                                <img src=" {{ asset('imagenes/negocios/'.$img->ima_nombre) }} " alt="{{ $negocio->neg_nombre_corto }} ">
                            @endforeach
                    </div>
                @else
                    <p>No hay imágenes para mostrar</p>
                @endif

            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- Información de covid-19 --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infocovid19">
            <div class="bg-danger p-3 text-uppercase text-white font-weight-bold hover border-top border-bottom" data-target="#infocovid19One"  data-toggle="collapse">
                COVID-19 <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infocovid19" id="infocovid19One">
                <div class="border-bottom">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading font-weigth-bold"> <a href="https://twitter.com/search?q=%23QuedateEnCasaGT&src=typeahead_click" target="_blank" class="text-danger"> <i class="fa fa-twitter"></i> #QuedateEnCasaGT</a> </h4>

                        <p>
                            Estas son las medidas que este negocio ha tomado para prevenir el contagio en sus establecimientos.
                            <br>
                            Por favor toma las medidas en cuenta esto cuando visites el sitio.
                        </p>
                        <hr>
                        <p class="mb-0">
                            Link del sitio oficial de información <a href="https://www.mspas.gob.gt/index.php/noticias/covid-19/coronavirus-2019-ncov" target="_blank">https://www.mspas.gob.gt</a>
                        </p>
                      </div>
                </div>

                <div class="border-bottom pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Uso obligatorio de mascarilla</div>
                    <p> {{ $negocio->covid19->cov_mascarilla ? "SI" : "NO" }} </p>
                </div>

                <div class="border-bottom pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Uso obligatorio de guantes</div>
                    <p> {{ $negocio->covid19->cov_guantes ? "SI" : "NO" }} </p>
                </div>

                <div class="border-bottom pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Aplicación de alcohol en gel</div>
                    <p> {{ $negocio->covid19->cov_alcohol_gel ? "SI" : "NO" }} </p>
                </div>

                <div class="pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Procedimiento de compra</div>
                    {{-- <p> {{ $negocio->covid19->cov_procedimiento }} </p> --}}
                    <p>
                        <ol>
                            <li>Uso obligatorio de mascarilla.</li>
                            <li>Aplicación de alcohol en gel.</li>
                            <li>Te tomaremos la temperatura, si poseen una temperatura mayor o igual a 37grados no podrás ingresar.</li>
                            <li>Solo se permiten 3 personas dentro del sitio. Debes hacer cola con la distancia señalizada.</li>
                            <li>Debes estar a 1metro de distancia de nuestro personal. </li>
                        </ol>
                    </p>
                </div>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- horarios --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infohorarios">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infohorariosOne"  data-toggle="collapse">
                HORARIOS <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infohorarios" id="infohorariosOne">
                <div class="pb-3">
                    @php $horario = Util::HORARIO_DEL_DIA($negocio->neg_hor_fk); @endphp
                    @if ($horario->cerrado)
                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle"></i> CERRADO TODO EL DÍA </span>
                    @else
                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle {{ Util::ESTA_ABIERTO($horario->inicio, $horario->fin) ? "text-success" : "text-danger" }}"></i>  {{ Util::ESTA_ABIERTO($horario->inicio, $horario->fin) ? "ABIERTO" : "CERRADO" }} | {{ Util::FH($horario->inicio).' - '.Util::FH($horario->fin) }} </span>
                    @endif
                </div>
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">DÍA</th>
                            <th scope="col">INICIO</th>
                            <th scope="col">FIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="{{ Date("w") == 1 ? 'table-info' : "" }}">
                            <th scope="row">Lunes </th>
                            @if($negocio->horario->hor_cer_lun)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_lun) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_lun) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 2 ? 'table-info' : "" }}">
                            <th scope="row">Martes</th>
                            @if($negocio->horario->hor_cer_mar)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_mar) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_mar) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 3 ? 'table-info' : "" }}">
                            <th scope="row">Miercoles</th>
                            @if($negocio->horario->hor_cer_mie)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_mie) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_mie) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 4 ? 'table-info' : "" }}">
                            <th scope="row">Jueves</th>
                            @if($negocio->horario->hor_cer_jue)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_jue) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_jue) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 5 ? 'table-info' : "" }}">
                            <th scope="row">Viernes</th>
                            @if($negocio->horario->hor_cer_vie)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_vie) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_vie) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 6 ? 'table-info' : "" }}">
                            <th scope="row">Sábado</th>
                            @if($negocio->horario->hor_cer_sab)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_sab) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_sab) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 0 ? 'table-info' : "" }}">
                            <th scope="row">Domingo</th>
                            @if($negocio->horario->hor_cer_dom)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($negocio->horario->hor_ini_dom) }} </td>
                                <td> {{ Util::FH($negocio->horario->hor_fin_dom) }} </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ---------------------------------------------------- --}}
        {{-- formas de pago --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infoformaspago">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infoformaspagoOne"  data-toggle="collapse">
                Formas de pago <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infoformaspago" id="infoformaspagoOne">
                <div>
                    @if ($negocio->formaspago->fpa_efectivo)
                        <span class="badge badge-warning p-2">Efectivo</span>
                    @endif

                    @if ($negocio->formaspago->fpa_tarjetas)
                        <span class="badge badge-dark p-2">Tarjetas</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------- --}}
        {{-- parqueos --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infoparqueos">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infoparqueosOne"  data-toggle="collapse">
                Parqueos <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infoparqueos" id="infoparqueosOne">
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"></th>
                            <th class="text-center" scope="col">Cantidad</th>
                            <th class="text-center" scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Carros</th>
                            <td class="text-center"> {{ $negocio->parqueos->par_cantidad_carros }} </td>
                            <td class="text-right"> Q {{ number_format($negocio->parqueos->par_precio_carros, 2) }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Motos</th>
                            <td class="text-center"> {{ $negocio->parqueos->par_cantidad_motos }} </td>
                            <td class="text-right"> Q {{ number_format($negocio->parqueos->par_precio_motos, 2) }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Discapacitados</th>
                            <td class="text-center"> {{ $negocio->parqueos->par_cantidad_discapacitados }} </td>
                            <td class="text-right"> Q {{ number_format($negocio->parqueos->par_precio_discapacitados, 2) }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- sucursales --}}
        {{-- ---------------------------------------------------- --}}
        @if ( count($negocio->sucursales) > 0 )
            <div class="acordion" id="infosucursales">
                <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infosucursalesOne"  data-toggle="collapse">
                    Sucursales <span class="float-right"> <i class="fa fa-minus"></i></span>
                </div>

                <div class="collapse show p-3" data-parent="#infosucursales" id="infosucursalesOne">
                    <div class="list-group list-group-flush">
                        @foreach ($negocio->sucursales as $suc)
                            <a href="{{ route('web.sucursal', [$negocio->neg_nombre_corto, $suc->suc_nombre]) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 font-weight-bold text-dark"> {{ $suc->suc_nombre }} </h5>
                                <small>
                                    @php $horariosuc = Util::HORARIO_DEL_DIA($suc->suc_hor_fk); @endphp
                                    @if ($horariosuc->cerrado)
                                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle"></i> CERRADO </span>
                                    @else
                                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle {{ Util::ESTA_ABIERTO($horariosuc->inicio, $horariosuc->fin) ? "text-success" : "text-danger" }}"></i> {{ Util::FH($horariosuc->inicio).' - '.Util::FH($horariosuc->fin) }} </span>
                                    @endif
                                    {{-- <span class="badge badge-success badge-pill">Abierto</span> --}}
                                </small>
                                </div>
                                <p class="mb-1 text-muted small"> {{$suc->municipio->departamento->dep_nombre}} : {{$suc->municipio->mun_nombre}} : {{$suc->suc_ubicacion}} </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="mt-5"></div>
    </div>
@endsection



@section('css')
    {{-- <link rel="stylesheet" href="{{ asset("js/libs/galeria/themes/folio/galleria.folio.min.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("js/libs/galeria/themes/twelve/galleria.twelve.min.css") }}"> --}}
    <link rel="stylesheet" href="{{ asset("js/libs/galeria/themes/azur/galleria.azur.min.css") }}">
    <style>
        .border-left{
            border-left: 3px solid !important;
            border-color: #28a745!important;
        }
        .border-left-danger{
            border-left: 3px solid !important;
            border-color: #dc3545!important;
        }
        .bg-blue{
            background:  #105EAB !important;
            background-color: #105EAB !important;
            color: #fff !important;
        }
        .text-title-img{
            font-size: 20px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
        .text-title{
            font-size: 40px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
        .galleria{ width: 100%;height: 467px;background: #fff; }
    </style>
@endsection



@section('js')
     <script src="{{ asset("js/libs/galeria/galleria.min.js") }}"></script>
     {{-- <script src="{{ asset("js/libs/galeria/themes/folio/galleria.folio.min.js") }}"></script> --}}
     {{-- <script src="{{ asset("js/libs/galeria/themes/twelve/galleria.twelve.min.js") }}"></script> --}}
     <script src="{{ asset("js/libs/galeria/themes/azur/galleria.azur.min.js") }}"></script>
     <script>
            $(function() {
              Galleria.run('.galleria', {
                    // Set this to false if you want to have captions visible all the time
                    _toggleCaption: true,

                    // Toggles tooltip
                    _showTooltip: true,

                    // Sets this to false if you don’t want to show the captions initially
                    _showCaption: false,

                    // Localized strings, modify these if you want tooltips in your language
                    _locale: {
                        show_captions: 'Mostar subtitulos',
                        hide_captions: 'Ocultar subtitulos',
                        play: 'Iniciar presentación',
                        pause: 'Pausar la presentación',
                        enter_fullscreen: 'Entrar en pantalla completa',
                        exit_fullscreen: 'Salir de pantalla completa',
                        next: 'Siguiente imagen',
                        prev: 'Anterior imagen',
                        showing_image: 'Mostrar imagen %s de %s'
                    }
              });
              $("[data-toggle='collapse']").click(function(){
                let id = $(this).data("target");

                if($(id).hasClass("show")){
                    $(this).find("i").removeClass("fa-minus").addClass("fa-plus");
                }
                else{
                    $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
                }
              });
            });
     </script>
@endsection
