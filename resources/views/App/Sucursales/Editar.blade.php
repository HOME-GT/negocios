@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-5 bg-white shadow-sm rounded">
        <div class="row border-bottom">
            <div class="col-md-8 text-center text-md-left text-lg-left">
                <h1 class="text-title">Editar sucursal: {{ $suc->negocio->neg_nombre_completo }} </h1>
                <p>Editar sucursal</p>
            </div>
            <div class="col-md-4 text-center text-md-right text-lg-right mb-4 mb-md-0 mb-lg-0">
                <a href="{{ route("app.sucursales.nuevo.get",$suc->negocio->neg_id) }}" class="btn btn-primary rounded-0"> <i class="fa fa-plus"></i> Nuevo </a>
            </div>
        </div>

        <div class="">
            <form action="{{route('app.sucursales.edicion.post',$suc->suc_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                {{-- Información general --}}
                <div class="accordion" id="infogeneral">
                    <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infogeneralOne"  data-toggle="collapse" >
                        Información general <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                    </h6>

                    <div class="collapse show" data-parent="#infogeneral" id="infogeneralOne">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nombre_completo" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Nombre completo de la persona, institución, empresa o negocio que se desee crear, ejemplo: 'Almacenes de Refrigeración, S.A.'."></i>
                                    Nombre completo
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control {{ $errors->has('nombre_completo') ? 'is-invalid' : '' }}" value="{{ old('nombre_completo',$suc->suc_nombre) }}">
                                @if ($errors->has('nombre_completo'))
                                    <span class="invalid-feedback" role="alert"> {{ $errors->first('nombre_completo') }} </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="departamento" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Nombre del departamento donde se ubica la empresa o negocio, seleccione de la lista."></i>
                                    Departamento
                                    <span class="text-danger">*</span>
                                </label>
                                @php
                                    $item = (old("departamento",$suc->municipio->departamento->dep_id) != null ? \App\Models\departamento::where("dep_id", old("departamento",$suc->municipio->departamento->dep_id))->first() : null);
                                @endphp
                                <select name="departamento" id="departamento" class="select2 w-100 {{ $errors->has('departamento') ? 'is-invalid' : '' }}">
                                    @if($item != null)
                                        <option value="{{$item->dep_id}}" title="{{$item->dep_nombre}}" selected> {{$item->dep_nombre}} </option>
                                    @endif
                                </select>
                                @if ($errors->has('departamento'))
                                    <span class="invalid-feedback" role="alert"> {{ $errors->first('departamento') }} </span>
                                @endif
                                <input type="hidden" name="pais" id="pais" value="1">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="municipio" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Nombre del municipio donde se encuentre el negocio, seleccione de la lista.  "></i>
                                    Municipio
                                    <span class="text-danger">*</span>
                                </label>
                                @php
                                    $item = (old("municipio",$suc->suc_mun_fk) != null ? \App\Models\municipio::where("mun_id", old("municipio",$suc->suc_mun_fk))->first() : null);
                                @endphp
                                <select name="municipio" id="municipio" class="select2 w-100 {{ $errors->has('municipio') ? 'is-invalid' : '' }}">
                                    @if($item != null)
                                        <option value="{{$item->mun_id}}" title="{{$item->mun_nombre}}" selected> {{$item->mun_nombre}} </option>
                                    @endif
                                </select>
                                @if ($errors->has('municipio'))
                                    <span class="invalid-feedback" role="alert"> {{ $errors->first('municipio') }} </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ubicacion" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Proporciona puntos de referencia para poder llegar a la empresa o negocio, nombre de la aldea, caserío, cantón, etc."></i>
                                    Ubicación
                                </label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control {{ $errors->has('ubicacion') ? 'is-invalid' : '' }}" value="{{ old('ubicacion',$suc->suc_ubicacion) }}" >
                                @if ($errors->has('ubicacion'))
                                    <span class="invalid-feedback" role="alert"> {{ $errors->first('ubicacion') }} </span>
                                @endif
                                <small class="form-text text-muted">Zona, Colonia, aldea, etc...</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Información de contacto --}}
                <div class="accordion" id="infocontacto">
                    <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infocontactoOne"  data-toggle="collapse">
                        Información de contacto <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                    </h6>
                    <div class="collapse show" data-parent="#infocontacto" id="infocontactoOne">
                        <div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="telefono1" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Se ingresa el número de teléfono fijo si se tiene o celular."></i>
                                        Telefono 1
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+502</span>
                                        </div>
                                        <input type="text"  id="telefono1" name="telefono1" class="form-control form-control-sm {{ $errors->has('telefono1') ? 'is-invalid' : '' }}" value="{{ old('telefono1',$suc->contacto->con_telefono1) }}" >
                                        @if ($errors->has('telefono1'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('telefono1') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefono2" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Si en la casilla anterior ya se ingresó teléfono fijo acá se ingresa algún número de celular."></i>
                                        Telefono 2
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+502</span>
                                        </div>
                                        <input type="text" id="telefono2" name="telefono2" class="form-control form-control-sm {{ $errors->has('telefono2') ? 'is-invalid' : '' }}" value="{{ old('telefono2',$suc->contacto->con_telefono2) }}">
                                        @if ($errors->has('telefono2'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('telefono2') }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="correo1" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Se ingresa correo electrónico de la empresa o correo personal donde los clientes los puedan contactar."></i>
                                        Correo 1
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="correo1" name="correo1" class="form-control form-control-sm {{ $errors->has('correo1') ? 'is-invalid' : '' }}"  value="{{ old('correo1',$suc->contacto->con_correo1) }}">
                                    @if ($errors->has('correo1'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('correo1') }} </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="correo2" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Se ingresa correo electrónico de la empresa o correo personal donde los clientes los puedan contactar."></i>
                                        Correo 2
                                    </label>
                                    <input type="text" id="correo2" name="correo2" class="form-control form-control-sm {{ $errors->has('correo2') ? 'is-invalid' : '' }}"  value="{{ old('correo2',$suc->contacto->con_correo2) }}">
                                    @if ($errors->has('correo2'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('correo2') }} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="pagina" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Enlace o vínculo al sitio oficial del negocio donde se podrá tener acceso a información de productos y servicios de forma amplia."></i>
                                        Link Pagina
                                    </label>
                                    <input type="text" id="pagina" name="pagina" class="form-control form-control-sm {{ $errors->has('pagina') ? 'is-invalid' : '' }}" value="{{ old('pagina',$suc->contacto->con_pagina) }}">
                                    @if ($errors->has('pagina'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('pagina') }} </span>
                                    @endif
                                    <small class="form-text text-muted">http://www.negocios.com.gt</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="facebook" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Enlace o vínculo a la Fanpage del negocio, de la red social Facebook."></i>
                                        Link Facebook
                                    </label>
                                    <input type="text" id="facebook" name="facebook" class="form-control form-control-sm {{ $errors->has('facebook') ? 'is-invalid' : '' }}" value="{{ old('facebook',$suc->contacto->con_facebook) }}">
                                    @if ($errors->has('facebook'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('facebook') }} </span>
                                    @endif
                                    <small class="form-text text-muted">http://www.facebook.com/usuario</small>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="google_maps" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Enlace o vínculo a Google Maps para acceder a la ubicación del negocio. "></i>
                                        Link de Google Maps
                                    </label>
                                    <input type="text" id="google_maps" name="google_maps" class="form-control form-control-sm  {{ $errors->has('google_maps') ? 'is-invalid' : '' }}" value="{{ old('google_maps',$suc->contacto->con_google_maps) }}">
                                    @if ($errors->has('google_maps'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('google_maps') }} </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="whatsapp" class="small">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Si la empresa o negocio posee WhatsApp empresarial o algún numero que sirva para atención al cliente usando WhatsApp se ingresa acá."></i>
                                        Número de WhatsApp
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+502</span>
                                        </div>
                                        <input type="text" id="whatsapp" name="whatsapp" class="form-control form-control-sm  {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}"  value="{{ old('whatsapp',$suc->contacto->con_whatsapp) }}" >
                                        @if ($errors->has('whatsapp'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('whatsapp') }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="direccion" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Dirección completa de la empresa o negocio."></i>
                                    Dirección completa
                                </label>
                                <input type="text" id="direccion" name="direccion" class="form-control form-control-sm {{ $errors->has('direccion') ? 'is-invalid' : '' }}"  value="{{ old('direccion',$suc->contacto->con_direccion) }}">
                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert"> {{ $errors->first('direccion') }} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- HORARIOS --}}
                <div class="accordion" id="infohorario">
                    <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infohorarioOne"  data-toggle="collapse">
                        Horarios <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                    </h6>
                    <div class="collapse show" data-parent="#infohorario" id="infohorarioOne">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-light">
                                <tr class="small">
                                    <th scope="col">
                                        DÍA
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Días de la semana en el cual se presta el servicio."></i>
                                    </th>
                                    <th scope="col">
                                        INICIO
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Hora en la cual inicia la atención a los clientes."></i>
                                    </th>
                                    <th scope="col">
                                        FIN
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Hora de cierre del negocio."></i>
                                    </th>
                                    <th scope="col">
                                        CERRADO
                                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Clik acá si determinado día se encuentra cerrado el negocio o sin atención al público."></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Lunes</th>
                                    <td>
                                        <input type="text" id="inicio_lunes" name="inicio_lunes" class="timepicker form-control form-control-sm {{ $errors->has('inicio_lunes') ? 'is-invalid' : '' }}"  value="{{ old('inicio_lunes', Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_lun)) }}" >
                                        @if ($errors->has('inicio_lunes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_lunes') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text"  id="fin_lunes" name="fin_lunes" class="timepicker form-control form-control-sm {{ $errors->has('fin_lunes') ? 'is-invalid' : '' }}"  value="{{ old('fin_lunes',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_lun)) }}">
                                        @if ($errors->has('fin_lunes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_lunes') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_lunes" name="cerrado_lunes" {{(old("cerrado_lunes",$suc->horario->hor_cer_lun) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_lunes"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Martes</th>
                                    <td>
                                        <input type="text" id="inicio_martes" name="inicio_martes" class="timepicker form-control form-control-sm {{ $errors->has('inicio_martes') ? 'is-invalid' : '' }}"  value="{{ old('inicio_martes',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_mar)) }}">
                                        @if ($errors->has('inicio_martes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_martes') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_martes" name="fin_martes" class="timepicker form-control form-control-sm {{ $errors->has('fin_martes') ? 'is-invalid' : '' }}"  value="{{ old('fin_martes',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_mar)) }}">
                                        @if ($errors->has('fin_martes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_martes') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_martes" name="cerrado_martes" {{(old("cerrado_martes",$suc->horario->hor_cer_mar) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_martes"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Miércoles</th>
                                    <td>
                                        <input type="text" id="inicio_miercoles" name="inicio_miercoles"  class="timepicker form-control form-control-sm {{ $errors->has('inicio_miercoles') ? 'is-invalid' : '' }}"  value="{{ old('inicio_miercoles',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_mie)) }}">
                                        @if ($errors->has('inicio_miercoles'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_miercoles') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_miercoles" name="fin_miercoles" class="timepicker form-control form-control-sm {{ $errors->has('fin_miercoles') ? 'is-invalid' : '' }}"  value="{{ old('fin_miercoles',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_mie)) }}">
                                        @if ($errors->has('fin_miercoles'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_miercoles') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_miercoles" name="cerrado_miercoles" {{(old("cerrado_miercoles",$suc->horario->hor_cer_mie) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_miercoles"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jueves</th>
                                    <td>
                                        <input type="text" id="inicio_jueves" name="inicio_jueves"  class="timepicker form-control form-control-sm {{ $errors->has('inicio_jueves') ? 'is-invalid' : '' }}"  value="{{ old('inicio_jueves',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_jue)) }}">
                                        @if ($errors->has('inicio_jueves'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_jueves') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_jueves" name="fin_jueves"  class="timepicker form-control form-control-sm {{ $errors->has('fin_jueves') ? 'is-invalid' : '' }}"  value="{{ old('fin_jueves',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_jue)) }}">
                                        @if ($errors->has('fin_jueves'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_jueves') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_jueves" name="cerrado_jueves" {{(old("cerrado_jueves",$suc->horario->hor_cer_jue) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_jueves"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Viernes</th>
                                    <td>
                                        <input type="text" id="inicio_viernes" name="inicio_viernes" class="timepicker form-control form-control-sm {{ $errors->has('inicio_viernes') ? 'is-invalid' : '' }}"  value="{{ old('inicio_viernes',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_vie)) }}">
                                        @if ($errors->has('inicio_viernes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_viernes') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_viernes" name="fin_viernes" class="timepicker form-control form-control-sm {{ $errors->has('fin_viernes') ? 'is-invalid' : '' }}"  value="{{ old('fin_viernes',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_vie)) }}" >
                                        @if ($errors->has('fin_viernes'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_viernes') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_viernes" name="cerrado_viernes" {{(old("cerrado_viernes",$suc->horario->hor_cer_vie) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_viernes"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Sábado</th>
                                    <td>
                                        <input type="text" id="inicio_sabado" name="inicio_sabado"  class="timepicker form-control form-control-sm {{ $errors->has('inicio_sabado') ? 'is-invalid' : '' }}"  value="{{ old('inicio_sabado',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_sab)) }}">
                                        @if ($errors->has('inicio_sabado'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_sabado') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_sabado" name="fin_sabado"  class="timepicker form-control form-control-sm {{ $errors->has('fin_sabado') ? 'is-invalid' : '' }}"  value="{{ old('fin_sabado',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_sab)) }}">
                                        @if ($errors->has('fin_sabado'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_sabado') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_sabado" name="cerrado_sabado" {{(old("cerrado_sabado",$suc->horario->hor_cer_sab) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_sabado"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Domingo</th>
                                    <td>
                                        <input type="text"  id="inicio_domingo" name="inicio_domingo" class="timepicker form-control form-control-sm {{ $errors->has('inicio_domingo') ? 'is-invalid' : '' }}"  value="{{ old('inicio_domingo',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_ini_dom)) }}">
                                        @if ($errors->has('inicio_domingo'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('inicio_domingo') }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" id="fin_domingo" name="fin_domingo"  class="timepicker form-control form-control-sm {{ $errors->has('fin_domingo') ? 'is-invalid' : '' }}"  value="{{ old('fin_domingo',Util::HOR_MIN_SEG_VIEW($suc->horario->hor_fin_dom)) }}">
                                        @if ($errors->has('fin_domingo'))
                                            <span class="invalid-feedback" role="alert"> {{ $errors->first('fin_domingo') }} </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cerrado_domingo" name="cerrado_domingo" {{(old("cerrado_domingo",$suc->horario->hor_cer_sab) != null)?"checked":""}}>
                                            <label class="custom-control-label" for="cerrado_domingo"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block">Editar Sucursal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        $(document).ready(function() {
            _initMascaraTelefono("telefono1");
            _initMascaraTelefono("telefono2");
            _initMascaraTelefono("whatsapp");

            $("#formaspago").select2();
            _initSelect2("{{route("web.catalogos.departamentos")}}", "#departamento", true, "#pais", "#municipio");
            _initSelect2("{{route("web.catalogos.municipios")}}", "#municipio", true, "#departamento");
            _initSelect2("{{route("web.catalogos.categorias")}}", "#categoria", true);

            $('.timepicker').timepicker({timeFormat: 'h:mm p', interval: 30, dynamic: false, dropdown: true, scrollbar: false });

            $("[id^='cerrado_']").click(function(){
                let id = $(this).attr("id").split("_")[1];
                if($(this).prop('checked')){
                    $(`#inicio_${id}`).attr("disabled", true).val("");
                    $(`#fin_${id}`).attr("disabled", true).val("");
                }
                else{
                    $(`#inicio_${id}`).attr("disabled", false);
                    $(`#fin_${id}`).attr("disabled", false);
                }
            });

            $('[data-toggle="popover"]').popover({
                title: "Ayuda",
                trigger: 'hover'
            });

            $("[id^='cerrado_']").each(function(){
                let id = $(this).attr("id").split("_")[1];
                if($(this).prop('checked')){
                    $(`#inicio_${id}`).attr("disabled", true).val("");
                    $(`#fin_${id}`).attr("disabled", true).val("");
                }
            });
        });


        function _initMascaraTelefono(_selector){
            var element = document.getElementById(_selector);
            var maskOptions = {
                mask: '0000-0000'
            };
            var mask = IMask(element, maskOptions);
        }

        function _initMascaraMoneda(_selector){
            //$("#"+_selector).addClass("text-right").val(0);
            var currencyMask = IMask(document.getElementById(_selector),
                {
                    mask: 'Qnum',
                    blocks: {
                    num: {
                        mask: Number,
                        thousandsSeparator: ',',
                        radix: '.',
                        signed: false, // disallow negative
                        scale: 2,  // digits after point, 0 for integers
                    }
                    }
                });
        }
    </script>
@endsection

