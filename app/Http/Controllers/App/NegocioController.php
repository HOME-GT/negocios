<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    public function ListadoView(){
        return view("App.Negocios.Listado");
    }

    public function NuevoView(){
        return view("App.Negocios.Nuevo");
    }

    public function EditarView(){
        return view("App.Negocios.Editar");
    }
}
