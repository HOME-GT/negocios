@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-3 bg-white shadow-sm rounded">
        <form action="">
            {{-- Información general --}}
            <div class="accordion" id="infogeneral">
                <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infogeneralOne"  data-toggle="collapse" >
                    Información general <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                </h6>

                <div class="collapse show" data-parent="#infogeneral" id="infogeneralOne">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre_completo" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Nombre completo
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre_corto" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Nombre Corto
                            </label>
                            <input type="text" class="form-control" id="nombre_corto" name="nombre_corto">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descripcion" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Descripción
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="departamento" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Departamento
                                <span class="text-danger">*</span>
                            </label>
                            <select name="departamento" id="departamento" class="select2 w-100"></select>
                            <input type="hidden" name="pais" id="pais" value="1">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="municipio" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Municipio
                                <span class="text-danger">*</span>
                            </label>
                            <select name="municipio" id="municipio" class="select2 w-100"></select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ubicacion" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Ubicación
                            </label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                            <small class="form-text text-muted">Zona, Colonia, aldea, etc...</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="logo" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Agregar Logo
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                <label for="logo" class="custom-file-label" data-browse="Elegir">[.png, .jpg, .svg]</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="categoria" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Categoría <span class="text-danger">*</span>
                            </label>
                            <select name="categoria" id="categoria" class="select2 w-100"></select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="servicio_domicilio" name="servicio_domicilio">
                                <label class="custom-control-label" for="servicio_domicilio">
                                    ¿El negocio tiene servicio a domicilio?
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </label>
                              </div>
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
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Telefono 1
                                </label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+502</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="telefono1" name="telefono1">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefono2" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Telefono 2
                                </label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+502</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="telefono2" name="telefono2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="correo1" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Correo 1
                                </label>
                                <input type="text" class="form-control form-control-sm" id="correo1" name="correo1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="correo2" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Correo 2
                                </label>
                                <input type="text" class="form-control form-control-sm" id="correo2" name="correo2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="pagina" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Link Pagina
                                </label>
                                <input type="text" class="form-control form-control-sm" id="pagina" name="pagina">
                                <small class="form-text text-muted">http://www.negocios.com.gt</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="facebook" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Link Facebook
                                </label>
                                <input type="text" class="form-control form-control-sm" id="facebook" name="facebook">
                                <small class="form-text text-muted">http://www.facebook.com/usuario</small>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="google_maps" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Link de Google Maps
                                </label>
                                <input type="url" class="form-control form-control-sm" id="google_maps" name="google_maps">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="whatsapp" class="small">
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                    Número de WhatsApp
                                </label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+502</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="whatsapp" name="whatsapp">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="small">
                                <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                Dirección completa
                            </label>
                            <input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
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
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </th>
                                <th scope="col">
                                    INICIO
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </th>
                                <th scope="col">
                                    FIN
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </th>
                                <th scope="col">
                                    CERRADO
                                    <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Lunes</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_lunes" name="inicio_lunes"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_lunes" name="fin_lunes"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_lunes" name="cerrado_lunes">
                                        <label class="custom-control-label" for="cerrado_lunes"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Martes</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_martes" name="inicio_martes"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_martes" name="fin_martes"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_martes" name="cerrado_martes">
                                        <label class="custom-control-label" for="cerrado_martes"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Miércoles</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_miercoles" name="inicio_miercoles"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_miercoles" name="fin_miercoles"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_miercoles" name="cerrado_miercoles">
                                        <label class="custom-control-label" for="cerrado_miercoles"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jueves</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_jueves" name="inicio_jueves"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_jueves" name="fin_jueves"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_jueves" name="cerrado_jueves">
                                        <label class="custom-control-label" for="cerrado_jueves"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Viernes</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_viernes" name="inicio_viernes"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_viernes" name="fin_viernes"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_viernes" name="cerrado_viernes">
                                        <label class="custom-control-label" for="cerrado_viernes"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Sábado</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_sabado" name="inicio_sabado"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_sabado" name="fin_sabado"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_sabado" name="cerrado_sabado">
                                        <label class="custom-control-label" for="cerrado_sabado"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Domingo</th>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="inicio_domingo" name="inicio_domingo"></td>
                                <td><input type="text" class="timepicker form-control form-control-sm" id="fin_domingo" name="fin_domingo"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cerrado_domingo" name="cerrado_domingo">
                                        <label class="custom-control-label" for="cerrado_domingo"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- FORMAS DE PAGO --}}
            <div class="acordion" id="infoformaspago">
                <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infoformaspagoOne"  data-toggle="collapse">
                    Formas de pago <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                </h6>
                <div class="collapse show mb-2" data-parent="#infoformaspago" id="infoformaspagoOne">
                    <label for="formaspago">
                        <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                        Selecione todas las formas de pago
                    </label>
                    <select name="formaspago" id="formaspago" multiple class="select2 w-100">
                        <option value="EF" selected> Efectivo </option>
                        <option value="TJ"> Tarjetas </option>
                    </select>
                </div>
            </div>

            {{-- PARQUEDOS --}}
            <div class="acordion" id="infoparqueo">
                <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infoparqueoOne"  data-toggle="collapse">
                    Parqueos <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                </h6>
                <div class="collapse show mb-2" data-parent="#infoparqueo" id="infoparqueoOne">
                    <div class="form-group row">
                        <label for="motos" class="col-sm-2 col-form-label col-form-label-sm">
                            <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            Motos
                        </label>
                        <div class="col-sm-5">
                            <small class="form-text">Cantidad</small>
                            <input type="number" class="form-control form-control-sm text-right" id="cantidadmotos" name="cantidadmotos">
                        </div>
                        <div class="col-sm-5">
                            <small class="form-text">Precio</small>
                            <input type="text" class="form-control form-control-sm" id="preciomotos" name="preciomotos" placeholder="Precio">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motos" class="col-sm-2 col-form-label col-form-label-sm">
                            <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            Carros
                        </label>
                        <div class="col-sm-5">
                            <small class="form-text">Cantidad</small>
                            <input type="number" class="form-control form-control-sm" id="cantidadcarros" name="cantidadcarros" placeholder="Cantidad">
                        </div>
                        <div class="col-sm-5">
                            <small class="form-text">Precio</small>
                            <input type="text" class="form-control form-control-sm" id="preciocarros" name="preciocarros" placeholder="Precio">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motos" class="col-sm-2 col-form-label col-form-label-sm">
                            <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            Discapacitaos
                        </label>
                        <div class="col-sm-5">
                            <small class="form-text">Cantidad</small>
                            <input type="number" class="form-control form-control-sm" id="cantidaddiscapacitados" name="cantidaddiscapacitados" placeholder="Cantidad">
                        </div>
                        <div class="col-sm-5">
                            <small class="form-text">Precio</small>
                            <input type="text" class="form-control form-control-sm" id="preciodiscapacitados" name="preciodiscapacitados" placeholder="Precio">
                        </div>
                    </div>
                </div>
            </div>

            {{-- IMAGENES --}}
            <div class="acordion" id="infoimagenes">
                <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infoimagenesOne"  data-toggle="collapse">
                    Imagenes
                    <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                </h6>
                <div class="collapse show mb-2" data-parent="#infoimagenes" id="infoimagenesOne">
                    <div class="form-group col-md-12">
                        <label for="imagenes" class="small">Agregar Imagenes</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imagenes" name="imagenes" multiple>
                            <label for="logo" class="custom-file-label" data-browse="Elegir">[.png, .jpg, .svg]</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COVID-19 --}}
            <div class="acordion" id="infocovid19">
                <h6 class="text-uppercase text-white bg-dark p-2 hover" data-target="#infocovid19One"  data-toggle="collapse">
                    Covid-19 <span class="float-right"> <i class="fa fa-chevron-down"></i></span>
                </h6>
                <div class="collapse show mb-2" data-parent="#infocovid19" id="infocovid19One">
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="mascarilla" checked>
                            <label class="custom-control-label" for="mascarilla">¿Es requida la mascarrilla? <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></label>
                          </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="guantes">
                            <label class="custom-control-label" for="guantes">¿Son requedios los guantes? <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i></label>
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="procedimiento" class="">
                            <i class="fa fa-info-circle" data-toggle="popover" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."></i>
                            Procedimiento de compra
                        </label>
                        <textarea name="proceimiento" id="proceimiento" class="form-control"></textarea>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block">Crear Negocio</button>
                </div>
            </div>
        </form>
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

            _initMascaraMoneda("preciomotos");
            _initMascaraMoneda("preciocarros");
            _initMascaraMoneda("preciodiscapacitados");

            _inputNumero("#cantidadmotos");
            _inputNumero("#cantidadcarros");
            _inputNumero("#cantidaddiscapacitados");

            $("#formaspago").select2();
            _initSelect2("{{route("app.catalogos.departamentos")}}", "#departamento", true, "#pais", "#municipio");
            _initSelect2("{{route("app.catalogos.municipios")}}", "#municipio", true, "#departamento");
            _initSelect2("{{route("app.catalogos.categorias")}}", "#categoria", true);

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
        });


        function _initMascaraTelefono(_selector){
            var element = document.getElementById(_selector);
            var maskOptions = {
                mask: '0000-0000'
            };
            var mask = IMask(element, maskOptions);
        }

        function _initMascaraMoneda(_selector){
            $("#"+_selector).addClass("text-right").val(0);
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
