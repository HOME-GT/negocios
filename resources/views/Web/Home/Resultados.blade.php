@extends('Web.Layout')

@section('Main')

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark shadow-sm">
            <form action="" class="w-100 form-search">
                <div class="form-row">
                    <div class="col-md-5 form-group mb-0 px-0">
                        <label for="query" class="text-white mb-0 pb-0"> &nbsp; </label>
                        <input id="query" name="query" type="search" class="form-control" placeholder="¿Qué negocio estas buscando?" autofocus tabindex="1">
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="categoria" class="text-white mb-0 pb-0"> <small>Categoría</small> </label>
                        <select name="categoria" id="categoria" class="form-control" tabindex="2">
                            <option value="0">Todas</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="departamento" class="text-white mb-0 pb-0"> <small>Departamento</small> </label>
                        <select name="departamento" id="departamento" class="form-control" tabindex="3">
                            <option value="0">Todos</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="municipio" class="text-white mb-0 pb-0"> <small>Municipio</small> </label>
                        <select name="municipio" id="municipio" class="form-control" tabindex="4">
                            <option value="0">Todos</option>
                        </select>
                    </div>
                    <div class="col-md-1 form-group mb-0 px-0">
                        <label for="" class="text-white mb-0 pb-0"> &nbsp; </label>
                        <button class="btn btn-primary btn-block" tabindex="5">Buscar</button>
                    </div>
                </div>
            </form>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Resultados de la búsqueda</h6>

        @foreach ([1,2,3,4,5,6,7] as $item)
            <div class="media text-muted pt-3 hover">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block font-weight-normal" style="font-size: 1.1rem"> <a href="#"> Nombre del negocio </a> </strong>
                    <span class="badge badge-dark">Categoría</span>
                    <span class="d-block text-dark" style="font-size: 0.9rem"> Descripción del negocio </span>
                    <span class="d-block" style="font-size: 0.7rem"> Departamento | Municipio | Ubicación </span>

                </p>
            </div>
        @endforeach
    </div>
@endsection
