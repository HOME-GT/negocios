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
        return view("Web.Home.Resultados");
    }
}
