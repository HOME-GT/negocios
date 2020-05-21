@extends('App.LayoutApp')
@section('Main')
    <div class="mt-3 p-5 mb-5 bg-white shadow-sm rounded">
        <div class="border-bottom mb-3">
            <h1 class="text-title">Perfil</h1>
        </div>

        <div class="">
            <form>
                <div class="form-group row">
                    <label for="nombres" class="col-sm-2 col-form-label">Nombre (s) <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos (s)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidos">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cui" class="col-sm-2 col-form-label">CUI <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" disabled class="form-control" id="cui">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono">
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
