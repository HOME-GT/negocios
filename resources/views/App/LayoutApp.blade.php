@extends('Web.Layout', ['title' => "App - NegociosGT"])
@section('Nav')
    <div class="nav-scroller bg-white shadow-sm">
        <nav class="nav nav-underline">
            <a class="nav-link" href=" {{ route('app.home.get') }} "> Dashboard </a>
            <a class="nav-link" href=" {{ route('app.perfil.perfil.get') }} "> Perfil </a>
            <a class="nav-link" href="#"> Negocios </a>
        </nav>
    </div>
@endsection
