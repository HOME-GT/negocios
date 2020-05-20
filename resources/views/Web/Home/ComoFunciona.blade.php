@extends('Web.Layout', ['title' => "¿Cómo funciona? - NegociosGT"])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded p-3">
        <div class="text-center py-4 ">
            <h1 class="text-title">¿Cómo funciona la plataforma?</h1>
            <p>NegociosGT es un directorio de negocios guatemaltecos. Es <span class="font-weight-bold">totalmente GRATIS</span>. </p>
        </div>

        <div class="row bg-light py-5">
            <div class="col-md-4 text-center order-1">
                <img src=" {{ asset("imagenes/utiles/account.svg") }} " alt="Crear Cuenta" height="160" >
            </div>
            <div class="col-md-8 border-left px-5 pt-md-2 order-2">
                <div class="mt-5 d-block d-block d-sm-none"></div>
                <h2 class="text-primary">Crear Cuenta</h2>
                <p>Para poder acceder a todas las funcionalidades del sitio NegociosGt, necesitas registrarte, se te solicitara información personal, la cual nos ayudara a tener información precisa y confiable, para que nuestros servicios sean de mucha utilidad.</p>
                <ul class="list-unstyled">
                    <li>Los datos que se te solicitaran para el registro se detallan a continuación:</li>
                    <ol>
                        <li>Accede al sitio <a href="http://negocios.com.gt/registro" target="_blank">negocios.com.gt/registro</a></li>
                        <li>En la casilla que se indica ingresa tus Nombres </li>
                        <li>En la casilla que se indica ingresa tus Apellidos</li>
                        <li>Ingresa el CUI, el cual se verificara si es correcto de acuerdo al Registro Nacional de las Personas</li>
                        <li>Ingresa una dirección de correo electrónico en el cual se te enviara la notificación correspondiente del registro</li>
                        <li>Ingresa tu numero de teléfono</li>
                        <li>Ingresa una contraseña, la cual te servirá para iniciar sesión al sitio NegoicosGT</li>
                        <li>Confirma la contraseña ingresada con anterioridad</li>
                        <li>Acepta los términos y condiciones, en la cual se regula la relación con los usuarios del sitio NegociosGT, de acuerdo al contenido y los servicios que se presta</li>
                        <li>Dale Click al botón registro</li>
                        <li>Posteriormente se te enviara a tu correo electrónico la confirmación de tu registro y ya podrás iniciar sesión y utilizar todas las funcionalidades del sitio</li>
                    </ol>
                </ul>
            </div>
        </div>

        <div class="row bg-white py-5">
            <div class="col-md-8 px-5 order-md-1 order-2">
                <div class="mt-5 d-block d-block d-sm-none"></div>
                <h2 class="text-primary">Agregar Negocio</h2>
                <p>Para poder agregar un negocio necesitas estar registrado e iniciar sesión, se te pedirá que llenes todos los campos obligatorios del formulario para registro de negocios. <br> El formulario esta dividido en 7 secciones las cuales te pedirán información correspondiente a tu negocio, con la cual te encontrarán los clientes en las determinadas búsquedas, las cuales se detallan a continuación:</p>
                <ul class="list-unstyled">
                    <li class="font-weight-bold">1. INFORMACION GENERAL</li>
                    <li>En esta sección se te pedirá información importante de tu negocio, como el nombre, categoría, dirección y ubicación donde se encuentra el negocio.</li>
                    <br>
                    <li class="font-weight-bold">2. INFORMACION DE CONTACTO</li>
                    <li>En esta sección se debe de ingresar números de teléfono, direcciones de correo electrónico, links a sitio web y redes sociales.</li>
                    <br>
                    <li class="font-weight-bold">3. HORARIOS</li>
                    <li>En esta sección se ingresan los horarios de atención al público, horarios especiales, etc.</li>
                    <br>
                    <li class="font-weight-bold">4. FORMAS DE PAGO</li>
                    <li>En esta sección se ingresan las formas de pago que aceptan los diferentes negocios, (tarjetas de crédito, transferencias bancarias, cheques, efectivo).</li>
                    <br>
                    <li class="font-weight-bold">5. PARQUEOS</li>
                    <li>En esta sección debes ingresar si el negocio cuenta con parqueo, la cantidad de parqueos disponibles y si existe alguna tarifa establecida.</li>
                    <br>
                    <li class="font-weight-bold">6. IMAGENES</li>
                    <li>En esta sección debes de ingresar imágenes de tu negocio o del producto que deseas publicitar.</li>
                    <br>
                    <li class="font-weight-bold">7. COVID-19</li>
                    <li>En esta sección ingresa si tienes algún protocolo establecido en tu negocio para mitigar la pandemia Covid-19.</li>
                </ul>
                <p>Debes de ingresar con mucho detalle la información requerida para que las personas que están buscando negocios como el tuyo te puedan encontrar con mayor facilidad.</p>
            </div>
            <div class="col-md-4 text-center border-left order-md-2 order-1">
                <img src=" {{ asset("imagenes/utiles/add_negocio.svg") }} " alt="Agregar Negocio" height="160" >
            </div>
        </div>


        <div class="row bg-light py-5">
            <div class="col-md-4 text-center order-1">
                <img src=" {{ asset("imagenes/utiles/search2.svg") }} " alt="Búsqueda del negocio" height="160" >
            </div>
            <div class="col-md-8 border-left px-5 order-2">
                <div class="mt-5 d-block d-block d-sm-none"></div>
                <h2 class="text-primary">Busqueda de tu negocio</h2>
                <p> <a href="{{ route("web.home") }} ">En esta sección</a> cualquier persona que este buscando un determinado negocio o servicio lo podrá encontrar, de acuerdo a la información que se ha ingresado previamente.Las búsquedas podrán ser por tipo de negocio, si éste está ubicado en algún Departamento, Municipio, Aldea, Cantón, Sector en particular. Muchas personas están buscando los productos o servicios que tu haces, así que ingresa tu negocio para que mas personas puedan ubicarte.</p>
            </div>
        </div>
    </div>

    <div class="my-5"></div>
@endsection


@section('css')
    <style>
        .text-primary{
            color: #105EAB !important;
            font-size: 32px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
        .text-title{
            font-size: 32px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
    </style>
@endsection
