@extends('Web.Layout', ['title'=> $query ? $query.' - NegociosGT Búsqueda' : 'NegociosGT Búsqueda' ])

@section('Main')

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark shadow-sm">
            <form action="" class="w-100 form-search">
                <div class="form-row">
                    <div class="col-md-5 form-group mb-0 px-0">
                        <label for="query" class="text-white mb-0 pb-0"> &nbsp; </label>
                    <input id="query" name="query" type="search" class="form-control" placeholder="¿Qué negocio estas buscando?" autofocus tabindex="1" value="{{ $query }}">
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="categoria" class="text-white mb-0 pb-0"> <small>Categoría</small> </label>
                        <select name="categoria" id="categoria" class="select2 w-100" tabindex="2"></select>
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="departamento" class="text-white mb-0 pb-0"> <small>Departamento</small> </label>
                        <select name="departamento" id="departamento" class="form-control" tabindex="3"></select>
                    </div>
                    <div class="col-md-2 form-group mb-0 px-0">
                        <label for="municipio" class="text-white mb-0 pb-0"> <small>Municipio</small> </label>
                        <select name="municipio" id="municipio" class="form-control" tabindex="4">
                            <option value="0" selected>Todos</option>
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

        @if (empty($query))
            {{-- resultados vacios --}}
            <div style="padding-top: 130px; padding-bottom: 130px;" class="text-center">
                <div>
                    <img src=" {{ asset('imagenes/utiles/empty.svg') }} " alt="Vacio" height="200">
                </div>
                <div>
                    <h5 class="">No se encontaron resultados para la búsqueda:  <span class="small text-muted"> {{ $query }} </span></h5>
                    <span class="small"> Si este negocio es tuyo agrégalo... <a href=" {{ route('app.negocio.nuevo.get') }} "> <i class="fa fa-plus"></i> Nuevo negocio  </a> </span>
                </div>
            </div>
        @else
            @foreach ([1,2,3,4,5,6,7] as $item)
                @if ($item % 2 != 0)
                    <div class="media text-muted pt-3 hover">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block font-weight-normal" style="font-size: 1.2rem"> <a href=" {{ route("web.negocio", $item) }} " class="text-primary"> Nombre del negocio </a> </strong>
                            <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle text-success"></i>  ABIERTO | 7:00AM - 8:00PM </span>
                            <span class="badge badge-dark">Categoría</span>
                            <span class="d-block text-dark" style="font-size: 0.9rem"> Descripción del negocio </span>
                            <span class="d-block" style="font-size: 0.7rem"> Departamento | Municipio | Ubicación </span>
                        </p>
                    </div>
                @else
                    <div class="media text-muted pt-3 hover">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <span class="d-block text-dark font-weight-bold" style="font-size: 0.6rem"> SUCURSAL </span>
                            <strong class="d-block font-weight-normal" style="font-size: 1.2rem"> <a href=" {{ route("web.sucursal", [$item, $item]) }} " class="text-primary"> Nombre del negocio - Zona 9</a> </strong>
                            <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle text-danger"></i>  CERRADO | 7:00AM - 8:00PM</span>
                            <span class="badge badge-dark">Categoría</span>
                            <span class="d-block text-dark" style="font-size: 0.9rem"> Descripción del negocio </span>
                            <span class="d-block" style="font-size: 0.7rem"> Departamento | Municipio | Ubicación </span>
                        </p>
                    </div>
                @endif
            @endforeach
        @endif

    </div>
@endsection



@section('js')
    <script>
        $(document).ready(function() {
            $("#categoria").select2();
            $("#municipio").select2();
            $("#departamento").select2();

            $.ajax({
                url: "{{route("web.catalogos.categorias")}}",
                type: "GET",
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                dataType: 'json',
                contentType: 'application/json',
                success: function(data){
                    $("#categoria").html("<option value='0' selected>Todos</option>");
                    for(let item of data.data){
                        $("#categoria").append(`<option value="${item.id}" ${ item.id=={{ $categoria }} ? "selected" : "" }  > ${item.text} </option>`);
                    }
                    $("#categoria").select2();
                }
            });

            $.ajax({
                url: "{{route("web.catalogos.departamentos")}}",
                type: "GET",
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                dataType: 'json',
                contentType: 'application/json',
                data: {
                    params: {
                        id: 1,
                        estado: true
                    }
                },
                success: function(data){
                    $("#departamento").html("<option value='0' selected>Todos</option>");
                    for(let item of data.data){
                        $("#departamento").append(`<option value="${item.id}" ${ item.id=={{ $departamento }} ? "selected" : "" } > ${item.text} </option>`);
                    }
                    $("#departamento").select2();
                    if({{ $departamento }} != 0){
                        $("#departamento").change();
                    }
                }
            });

            $("#departamento").change(function(){
                $.ajax({
                    url: "{{route("web.catalogos.municipios")}}",
                    type: "GET",
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                    dataType: 'json',
                    contentType: 'application/json',
                    data: {
                    params: {
                            id: $(this).val(),
                            estado: true
                        }
                    },
                    success: function(data){
                        $("#municipio").html("<option value='0' selected>Todos</option>");
                        for(let item of data.data){
                            $("#municipio").append(`<option value="${item.id}" ${ item.id=={{ $municipio }} ? "selected" : "" } > ${item.text} </option>`);
                        }
                        $("#municipio").select2();
                    }
                });
            });
        });
    </script>
@endsection


@section('css')
    <style>
        .select2-container--default .select2-selection--single {
            border-radius: 0px !important;
            border: 1px solid #ced4da !important;
            height: calc(1.5em + .75rem + 2px) !important;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
        }
        .text-primary{
            /* color: #105EAB !important; */
            /* font-size: 32px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif; */
        }
    </style>
@endsection
