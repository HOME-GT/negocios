@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-0 bg-white shadow-sm rounded">
        {{-- <div class="border-bottom mb-3">
            <h1 class="text-title">Cambio de clave</h1>
        </div> --}}

        <div class="">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading text-title">¿Deseas eliminar tu cuenta?</h4>
                <p>Al eliminar tu cuenta todos los negocios asociados se darán de baja y no podras recuperar la información ingresada.</p>
                <hr>
                <p class="mb-0">
                    <button class="btn btn-danger btn-block">ELIMINAR</button>
                </p>
              </div>
        </div>
    </div>
@endsection
