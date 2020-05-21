@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-5 bg-white shadow-sm rounded">
        <div class="row border-bottom">
            <div class="col-md-8 text-center text-md-left text-lg-left">
                <h1 class="text-title">Sucursales: {{ $neg->neg_nombre_completo }} </h1>
                <p>Muestra el listado de negocios asociados ésta cuenta</p>
            </div>
            <div class="col-md-4 text-center text-md-right text-lg-right mb-4 mb-md-0 mb-lg-0">
                <a href="{{ route("app.sucursales.nuevo.get",$neg->neg_id) }}" class="btn btn-primary rounded-0"> <i class="fa fa-plus"></i> Nuevo </a>
            </div>
        </div>

        <div class="mt-4">
            <table class="table" id="data-table" width="100%" cellspacing="0">
                <thead> </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
               columnas = [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', title:"NO"},
                    {data: 'suc_nombre', name: 'suc_nombre', title:"NOMBRE", className: "buscar"},
                    {data: 'suc_ubicacion', name: 'suc_ubicacion', title:"UBICACION", className: "buscar"},
                    {data: 'action', name: 'action', title:"ACCIONES", orderable: false, searchable: false, class:"text-center" },
               ];
               CrearDataTable("{{route('app.sucursales.listado.post',$neg->neg_id)}}", columnas);
          });
    </script>
@endsection
