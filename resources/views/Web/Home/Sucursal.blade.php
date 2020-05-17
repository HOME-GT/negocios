@extends('Web.Layout', ['title' => $negocio->neg_nombre_corto.' - '.$sucursal->suc_nombre, 'description'=> $sucursal->suc_nombre.' - '.$negocio->neg_descripcion])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded">
        <div class="p-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href=" {{ route('web.negocio', $negocio->neg_nombre_corto) }} "> {{ $negocio->neg_nombre_completo }} </a></li>
                  <li class="breadcrumb-item active" aria-current="page"> {{ $sucursal->suc_nombre }} </li>
                </ol>
            </nav>
        </div>

        <div class="px-3 pb-3">
            @if (empty($negocio->neg_logo))
                <small> {{ $negocio->neg_nombre_completo }} </small>
            @else
                <img class="" src=" {{ asset("imagenes/negocios/".$negocio->neg_logo) }} " alt="Logo - {{ $negocio->neg_nombre_corto }}" width="100">
            @endif
            <h2 class="mb-0 text-title"> {{ $sucursal->suc_nombre }} </h2>
            <p class="pt-0"> {{ $negocio->neg_descripcion }} </p>
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
                    <div class=" pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Ubicación</div>
                        <p> {{$sucursal->municipio->departamento->dep_nombre}} : {{$sucursal->municipio->mun_nombre}} : {{$sucursal->suc_ubicacion}}</p>
                    </div>
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
                    @php $horario = Util::HORARIO_DEL_DIA($sucursal->suc_hor_fk); @endphp
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
                            @if($sucursal->horario->hor_cer_lun)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_lun) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_lun) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 2 ? 'table-info' : "" }}">
                            <th scope="row">Martes</th>
                            @if($sucursal->horario->hor_cer_mar)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_mar) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_mar) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 3 ? 'table-info' : "" }}">
                            <th scope="row">Miercoles</th>
                            @if($sucursal->horario->hor_cer_mie)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_mie) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_mie) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 4 ? 'table-info' : "" }}">
                            <th scope="row">Jueves</th>
                            @if($sucursal->horario->hor_cer_jue)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_jue) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_jue) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 5 ? 'table-info' : "" }}">
                            <th scope="row">Viernes</th>
                            @if($sucursal->horario->hor_cer_vie)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_vie) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_vie) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 6 ? 'table-info' : "" }}">
                            <th scope="row">Sábado</th>
                            @if($sucursal->horario->hor_cer_sab)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_sab) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_sab) }} </td>
                            @endif
                        </tr>
                        <tr class="{{ Date("w") == 0 ? 'table-info' : "" }}">
                            <th scope="row">Domingo</th>
                            @if($sucursal->horario->hor_cer_dom)
                                <td colspan="2">CERRADO TODO EL DÍA </td>
                            @else
                                <td> {{ Util::FH($sucursal->horario->hor_ini_dom) }} </td>
                                <td> {{ Util::FH($sucursal->horario->hor_fin_dom) }} </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
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
                            @if (!empty($sucursal->contacto->con_telefono1))
                                <p class="mb-0 pb-0"> <a target="_blank" href="tel:+502 {{ $sucursal->contacto->con_telefono1 }} ">+502 {{ $sucursal->contacto->con_telefono1 }}</a> </p>
                            @endif
                            @if (!empty($sucursal->contacto->con_telefono2))
                                <p class="mb-0 pb-0"> <a target="_blank" href="tel:+502 {{ $sucursal->contacto->con_telefono2 }} ">+502 {{ $sucursal->contacto->con_telefono2 }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-whatsapp"></i> WhatsApp</div>
                            @if (!empty($sucursal->contacto->con_whatsapp))
                                <p> <a target="_blank" href="https://wa.me/502{{$sucursal->contacto->con_whatsapp}}">+502 {{ $sucursal->contacto->con_whatsapp }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-envelope"></i> Correo1</div>
                            @if (!empty($sucursal->contacto->con_correo1))
                                <p> <a target="_blank" href="mailto:{{$sucursal->contacto->con_correo1}}">{{ $sucursal->contacto->con_correo1 }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-envelope"></i> Correo2</div>
                            @if (!empty($sucursal->contacto->con_correo2))
                                <p> <a target="_blank" href="mailto:{{$sucursal->contacto->con_correo2}}">{{ $sucursal->contacto->con_correo2 }}</a> </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-web"></i> Página Web</div>
                            @if (!empty($sucursal->contacto->con_pagina))
                                <p> <a target="_blank" href="{{$sucursal->contacto->con_pagina}}">{{ $sucursal->contacto->con_pagina }}</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-facebook"></i> Facebook</div>
                            @if (!empty($sucursal->contacto->con_facebook))
                                <p> <a target="_blank" href="{{$sucursal->contacto->con_facebook}}">{{ $sucursal->contacto->con_facebook }}</a> </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-location-arrow"></i> Dirección</div>
                            @if (!empty($sucursal->contacto->con_direccion))
                                <p> {{ $sucursal->contacto->con_direccion }} </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-map-marked-alt"></i> Google Maps</div>
                            <div class="pt-2">
                                @if (!empty($sucursal->contacto->con_google_maps))
                                    <iframe src=" {{ $sucursal->contacto->con_google_maps }} " width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5"></div>
    </div>
@endsection


@section('css')
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
        .text-title{
            font-size: 40px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
    </style>
@endsection

@section('js')
     <script>
            $(function() {
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
