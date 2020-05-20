@extends('Web.Layout', ['title' => "App - NegociosGT"])
@section('Nav')
    <div class="bg-white shadow-sm"> {{-- nav-scroller --}}
        <nav class="nav nav-underline">
            <a class="nav-link" href=" {{ route('app.home.get') }} "> Dashboard </a>
            {{-- <a class="nav-link" href=" {{ route('app.perfil.perfil.get') }} "> Perfil </a> --}}
            {{-- <a class="nav-link" href=" {{ route('app.negocio.listado.get') }}"> Negocios </a> --}}

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Perfil</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="#">Cambio de clave</a>
                  <a class="dropdown-item" href="#">Eliminación de cuenta</a>
                </div>
            </div>

            <a class="nav-link" href=" {{ route('app.negocio.listado.get') }}"> Negocios </a>
        </nav>
    </div>
@endsection

@section('cssApp')
    <style>
        .text-title{
            font-size: 30px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
    </style>
@endsection
