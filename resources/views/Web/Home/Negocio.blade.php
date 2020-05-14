@extends('Web.Layout', ['title' => $negocio])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded">
        <div class="p-3">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <img class="d-inline mr-2" src=" {{ asset("imagenes/logo_home_color.svg") }} " alt="Logo" width="60">
                    <h1 class="d-inline text-title">HomeGT </h1> <span class="badge badge-pill badge-success">Abierto</span>
                </div>
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
                        <p>HomeGT</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Sobre el negocio</div>
                        <p>Aquí va la descripción del negocio. Una descripción de que se hace y de como funciona la cosa...</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Ubicación</div>
                        <p> Departamento : Municipio : Ubicación</p>
                    </div>
                    <div class="border-bottom pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">Categoría</div>
                        <p> Desarrollo de software </p>
                    </div>
                    <div class="pt-3">
                        <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-truck"></i> Servicio a domicilio</div>
                        <p> Este negocio SÍ cuenta con servicio a dominicilio. </p>
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
                            <p class="mb-0 pb-0"> <a href="#">+502 2323-2345</a> </p>
                            <p class="mt-0 pt-0"> <a href="#">+502 2323-2345</a> </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-whatsapp"></i> WhatsApp</div>
                            <p> <a href="#">+502 2323-2345</a> </p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-envelope"></i> Correo1</div>
                            <p> <a href="#">info@gmail.com</a> </p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-envelope"></i> Correo2</div>
                            <p> <a href="#">info@gmail.com</a> </p>
                        </div>
                    </div>

                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left"> <i class="fa fa-web"></i> Página Web</div>
                            <p> <a href="#">https://getbootstrap.com/ <i class="fa fa-angle-right"></i> </a> </p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-facebook"></i> Facebook</div>
                            <p> <a href="#">info@gmail.com</a> </p>
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="border-bottom">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-location-arrow"></i> Dirección</div>
                            <p> Dirección </p>
                        </div>
                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="">
                            <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left">  <i class="fa fa-map-marked-alt"></i> Google Maps</div>
                            <div class="pt-2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15437.360215431041!2d-90.44080485!3d14.6933517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858997894481cd59%3A0x2b94ecd55c7a582c!2sLa%20Estancia!5e0!3m2!1sen!2sgt!4v1589333508302!5m2!1sen!2sgt" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                <div class="galleria">
                    <img src=" {{ asset("imagenes/img1.jpg") }} " alt="">
                    <img src=" {{ asset("imagenes/img2.jpg") }} " alt="">
                    <img src=" {{ asset("imagenes/img3.jpg") }} " alt="">
                    <img src=" {{ asset("imagenes/img4.jpg") }} " alt="">
                    <img src=" {{ asset("imagenes/img5.jpg") }} " alt="">
               </div>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- Información de covid-19 --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infocovid19">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infocovid19One"  data-toggle="collapse">
                COVID-19 <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infocovid19" id="infocovid19One">
                <div class="border-bottom">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">#QuedateEnCasa</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">
                            Link del sitio oficial de información <a href="https://www.mspas.gob.gt/index.php/noticias/covid-19/coronavirus-2019-ncov" target="_blank">https://www.mspas.gob.gt</a>
                        </p>
                      </div>
                </div>

                <div class="border-bottom pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Uso obligatorio de mascarilla</div>
                    <p> SI. </p>
                </div>

                <div class="border-bottom pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Uso obligatorio de guantes</div>
                    <p> SI. </p>
                </div>

                <div class="pt-3">
                    <div class="m-0 p-0 small text-uppercase font-weight-bold text-dark pl-1 border-left-danger"> Procedimiento de compra</div>
                    <p> Procedimiento de compra </p>
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
                    <span class="badge badge-pill badge-success">Abierto</span>
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
                            <th scope="row">Lunes</th>
                            <td>10:00 AM</td>
                            <td>11:00 PM</td>
                        </tr>
                        <tr class="{{ Date("w") == 2 ? 'table-info' : "" }}">
                            <th scope="row">Martes</th>
                            <td>10:00 AM</td>
                            <td>11:00 PM</td>
                        </tr>
                        <tr class="{{ Date("w") == 3 ? 'table-info' : "" }}">
                            <th scope="row">Miercoles</th>
                            <td>10:00 AM</td>
                            <td>11:00 PM</td>
                        </tr>
                        <tr class="{{ Date("w") == 4 ? 'table-info' : "" }}">
                            <th scope="row">Jueves</th>
                            <td>10:00 AM</td>
                            <td>11:00 PM</td>
                        </tr>
                        <tr class="{{ Date("w") == 5 ? 'table-info' : "" }}">
                            <th scope="row">Viernes</th>
                            <td>10:00 AM</td>
                            <td>11:00 PM</td>
                        </tr>
                        <tr class="{{ Date("w") == 6 ? 'table-info' : "" }}">
                            <th scope="row">Sábado</th>
                            <td colspan="2">Cerrado</td>
                        </tr>
                        <tr class="{{ Date("w") == 0 ? 'table-info' : "" }}">
                            <th scope="row">Domingo</th>
                            <td colspan="2">Cerrado</td>
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
                    <span class="badge badge-warning p-2">Efectivo</span>
                    <span class="badge badge-dark p-2">Tarjetas</span>
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
                            <td class="text-center">0</td>
                            <td class="text-right">Q0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Motos</th>
                            <td class="text-center">0</td>
                            <td class="text-right">Q0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Discapacitados</th>
                            <td class="text-center">0</td>
                            <td class="text-right">Q0.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        {{-- ---------------------------------------------------- --}}
        {{-- sucursales --}}
        {{-- ---------------------------------------------------- --}}
        <div class="acordion" id="infosucursales">
            <div class="bg-blue p-3 text-uppercase text-primary font-weight-bold hover border-top border-bottom" data-target="#infosucursalesOne"  data-toggle="collapse">
                Sucursales <span class="float-right"> <i class="fa fa-minus"></i></span>
            </div>

            <div class="collapse show p-3" data-parent="#infosucursales" id="infosucursalesOne">
                <div class="list-group list-group-flush">
                    @foreach (['aaa', 'bbb', 'ccc', 'ddd'] as $suc)
                        <a href="{{ route('web.sucursal', [$negocio, $suc]) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1 font-weight-bold text-dark">Zona  {{ $suc }} </h5>
                              <small>
                                <span class="badge badge-success badge-pill">Abierto</span>
                              </small>
                            </div>
                            {{-- <small>Donec id elit non mi porta.</small> --}}
                            <p class="mb-1 text-muted">Departamento : Municipio : Ubicación</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

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
        .text-title{
            font-size: 55px;
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
              Galleria.run('.galleria');
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
