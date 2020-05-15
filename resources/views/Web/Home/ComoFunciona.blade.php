@extends('Web.Layout', ['title' => "¿Cómo funciona? - NegociosGT"])

@section('Main')
    <div class="bg-white shadow-sm mt-3 rounded p-3">
        <div class="text-center py-4 ">
            <h1 class="text-title">¿Cómo funciona la plataforma?</h1>
            <p>Descripción de la plataforma</p>
        </div>

        <div class="row bg-light py-5">
            <div class="col-md-4 text-center order-1">
                <img src=" {{ asset("imagenes/utiles/account.svg") }} " alt="Crear Cuenta" height="160" >
            </div>
            <div class="col-md-8 border-left px-5 pt-md-2 order-2">
                <div class="mt-5 d-block d-block d-sm-none"></div>
                <h2 class="text-primary">Crear Cuenta</h2>
                <p>The world is full of spectacular colors, and iMac brings more of them to your screen. The Retina display uses P3 color that shifts away from standard white LEDs to advanced red-green phosphor LEDs. That means all three colors — red, green, and blue — are more equally represented and show off real-world color with more balance and precision, bringing all your photos and content to life more vividly.</p>
            </div>
        </div>

        <div class="row bg-white py-5">
            <div class="col-md-8 px-5 order-md-1 order-2">
                <div class="mt-5 d-block d-block d-sm-none"></div>
                <h2 class="text-primary">Agregar Negocio</h2>
                <p>The world is full of spectacular colors, and iMac brings more of them to your screen. The Retina display uses P3 color that shifts away from standard white LEDs to advanced red-green phosphor LEDs. That means all three colors — red, green, and blue — are more equally represented and show off real-world color with more balance and precision, bringing all your photos and content to life more vividly.</p>
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
                <p>The world is full of spectacular colors, and iMac brings more of them to your screen. The Retina display uses P3 color that shifts away from standard white LEDs to advanced red-green phosphor LEDs. That means all three colors — red, green, and blue — are more equally represented and show off real-world color with more balance and precision, bringing all your photos and content to life more vividly.</p>
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
