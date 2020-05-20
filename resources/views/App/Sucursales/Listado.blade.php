@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-5 bg-white shadow-sm rounded">
        <div class="row border-bottom">
            <div class="col-md-8 text-center text-md-left text-lg-left">
                <h1 class="text-title">Sucursales: {NombreNegocio} </h1>
                <p>Muestra el listado de negocios asociados ésta cuenta</p>
            </div>
            <div class="col-md-4 text-center text-md-right text-lg-right mb-4 mb-md-0 mb-lg-0">
                <a href="{{ route("app.negocio.nuevo.get") }}" class="btn btn-primary rounded-0"> <i class="fa fa-plus"></i> Nuevo </a>
            </div>
        </div>

        <div class="">
        </div>
    </div>
@endsection
