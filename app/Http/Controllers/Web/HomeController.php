<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function showIndex(){
        return view("Web.Index");
    }

    public function showComoFunciona(Request $request){
        return view("Web.Home.ComoFunciona");
    }

    public function showResultados(Request $request){
        $query          = ($request->query('query') ? $request->query('query') : "");
        $categoria      = ($request->query('categoria') ? $request->query('categoria') : 0);
        $departamento   = ($request->query('departamento') ? $request->query('departamento') : 0);
        $municipio      = ($request->query('municipio') ? $request->query('municipio') : 0);

        return view("Web.Home.Resultados", [
            'query' => $query,
            'categoria' => $categoria,
            'departamento' => $departamento,
            'municipio' => $municipio
        ]);
    }


    public function showNegocio(string $nombreNegocio){
        return view("Web.Home.Negocio", [
            'negocio' => $nombreNegocio
        ]);
    }

    public function showSucursal(string $nombreNegocio, string $nombreSucursal){
        return view("Web.Home.Sucursal", [
            'negocio' => $nombreNegocio,
            'sucursal' => $nombreSucursal
        ]);
    }
}
