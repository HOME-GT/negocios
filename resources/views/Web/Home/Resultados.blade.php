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

        @if ( count($negocios) == 0)
            {{-- resultados vacios --}}
            <div style="padding-top: 130px; padding-bottom: 130px;" class="text-center">
                <div>
                    <img src=" {{ asset('imagenes/utiles/empty.svg') }} " alt="Vacio" height="200">
                </div>
                <div>
                    <h5 class="">No se encontaron resultados para la búsqueda:  <span class="small text-muted"> {{ $query }} </span></h5>
                    <span class="small"> Si éste negocio es tuyo agrégalo... <a href=" {{ route('app.negocio.nuevo.get') }} "> <i class="fa fa-plus"></i> Nuevo negocio  </a> </span>
                </div>
            </div>
        @else
            @foreach ($negocios as $neg)
                    <div class="media text-muted pt-3 hover">
                        @if(empty($neg->neg_logo))
                            <img src=" {{ asset('imagenes/utiles/cube.svg') }}" width="50" alt="Negocio" class="mr-2">
                        @else
                            <img src=" {{ asset('imagenes/negocios/'.$neg->neg_logo) }}" width="50" alt="Logo - {{ $neg->neg_nombre_corto }}" class="mr-2 rounded">
                        @endif

                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block font-weight-normal" style="font-size: 1.2rem"> <a href=" {{ route("web.negocio", $neg->neg_nombre_corto) }} " class="text-primary"> {{ $neg->neg_nombre_completo }} </a> </strong>
                            @php $horario = Util::HORARIO_DEL_DIA($neg->neg_hor_fk); @endphp
                            @if ($horario->cerrado)
                                <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle"></i> CERRADO TODO EL DÍA </span>
                            @else
                                <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle {{ Util::ESTA_ABIERTO($horario->inicio, $horario->fin) ? "text-success" : "text-danger" }}"></i>  {{ Util::ESTA_ABIERTO($horario->inicio, $horario->fin) ? "ABIERTO" : "CERRADO" }} | {{ Util::FH($horario->inicio).' - '.Util::FH($horario->fin) }} </span>
                            @endif

                            <span class="badge badge-dark"> {{ $neg->categoria->cat_nombre }} </span>
                            <span class="d-block text-dark" style="font-size: 0.9rem"> {{ $neg->neg_descripcion }} </span>
                            <span class="d-block" style="font-size: 0.7rem"> {{ $neg->municipio->departamento->dep_nombre }} | {{ $neg->municipio->mun_nombre }} | {{ $neg->neg_ubicacion }} </span>
                        </p>
                    </div>


                    @if ($neg->sucursales->count() > 0)
                        @foreach ($neg->sucursales as $suc)
                            <div class="media text-muted pt-3 hover ml-5">
                                {{-- <img src=" {{ asset('imagenes/negocios/'.$neg->neg_logo) }}" width="50" alt="Logo - {{ $neg->neg_nombre_corto }}" class="mr-2 rounded"> --}}
                                @if(empty($neg->neg_logo))
                                    <img src=" {{ asset('imagenes/utiles/cube.svg') }}" width="20" alt="Negocio" class="mr-2">
                                @else
                                    <img src=" {{ asset('imagenes/negocios/'.$neg->neg_logo) }}" width="50" alt="Logo - {{ $neg->neg_nombre_corto }}" class="mr-2 rounded">
                                @endif
                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block font-weight-normal" style="font-size: 1.2rem"> <a href=" {{ route("web.sucursal", [$neg->neg_nombre_corto, $suc->suc_nombre]) }} " class="text-primary"> {{ $suc->suc_nombre }}  </a> </strong>

                                    @php $horariosuc = Util::HORARIO_DEL_DIA($suc->suc_hor_fk); @endphp
                                    @if ($horariosuc->cerrado)
                                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle"></i> CERRADO TODO EL DÍA </span>
                                    @else
                                        <span class="d-block text-dark" style="font-size: 0.7rem"> <i class="fa fa-circle {{ Util::ESTA_ABIERTO($horariosuc->inicio, $horariosuc->fin) ? "text-success" : "text-danger" }}"></i>  {{ Util::ESTA_ABIERTO($horariosuc->inicio, $horariosuc->fin) ? "ABIERTO" : "CERRADO" }} | {{ Util::FH($horariosuc->inicio).' - '.Util::FH($horariosuc->fin) }} </span>
                                    @endif

                                    <span class="d-block" style="font-size: 0.7rem"> {{ $suc->municipio->departamento->dep_nombre }} | {{ $suc->municipio->mun_nombre }} | {{ $suc->suc_ubicacion }} </span>
                                </p>
                            </div>
                        @endforeach
                    @endif
            @endforeach

            <div class="pt-4 d-flex justify-content-end">
                {{ $negocios->appends(request()->input())->links() }}
            </div>
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
    </style>
@endsection
