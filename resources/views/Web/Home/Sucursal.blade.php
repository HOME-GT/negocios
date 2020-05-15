@extends('Web.Layout', ['title' => $negocio.' - '.$sucursal])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded">
        <div class="p-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href=" {{ route('web.negocio', $negocio) }} "> {{ $negocio }} </a></li>
                  <li class="breadcrumb-item active" aria-current="page"> {{ $sucursal }} </li>
                </ol>
            </nav>
        </div>

        <div class="px-3 pb-3">
            <small> {{ $negocio }} </small>
            <h2 class="mb-0 text-title"> {{ $sucursal }} </h2>
            <p class="pt-0">Aquí va la descripción del negocio. Una descripción de que se hace y de como funciona la cosa...</p>
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
                        <p> Departamento : Municipio : Ubicación</p>
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
            font-size: 55px;
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
