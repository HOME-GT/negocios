@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-5 bg-white shadow-sm rounded">
        <div class="border-bottom mb-3">
            <h1 class="text-title">Cambio de clave</h1>
        </div>

        <div class="">
            <form>
                <div class="form-group row">
                    <label for="clave_actual" class="col-sm-2 col-form-label">Clave actual <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="clave_actual" name="clave_actual">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nueva_clave" class="col-sm-2 col-form-label">Nueva Clave <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="nueva_clave" name="nueva_clave">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirmacion_clave" class="col-sm-2 col-form-label">Confirmación de clave <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="password" disabled class="form-control" id="confirmacion_clave" name="confirmacion_clave">
                    </div>
                </div>

                <div class="form-group mt-4 row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
