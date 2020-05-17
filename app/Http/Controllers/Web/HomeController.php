<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\negocio;
use App\Models\sucursales;
use App\Models\municipio;


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

        if($query != ""){

            $sucursales = sucursales::where(function($sql) use ($categoria, $departamento, $municipio){
                if($categoria > 0){ $sql->whereIn('suc_neg_fk', negocio::where('neg_cat_fk', $categoria)->pluck('neg_id')); }
                if($municipio > 0){ $sql->where('suc_mun_fk', $municipio); }
                if($municipio == 0 && $departamento > 0){ $sql->whereIn('suc_mun_fk',  municipio::where('mun_dep_fk', $departamento)->pluck('mun_id')); }
            })
            ->where(function($sql) use ($query){
                    $sql->orWhere('suc_nombre', 'like', "%{$query}%");
                    $sql->orWhere('suc_ubicacion', 'like', "%{$query}%");
            })->distinct()->pluck('suc_neg_fk');

            $negocios = negocio::where(function($sql) use ($query, $sucursales, $categoria, $departamento, $municipio){
                if($categoria > 0){
                    $sql->orWhere('neg_cat_fk', $categoria);
                }
                if($municipio > 0){
                    $sql->orWhere('neg_mun_fk', $municipio);
                }
                if($municipio == 0 && $departamento > 0){
                    $sql->orWhereIn('neg_mun_fk',  municipio::where('mun_dep_fk', $departamento)->pluck('mun_id'));
                }
                $sql->orWhere('neg_nombre_completo', 'like', "%{$query}%");
                $sql->orWhereIn('neg_id', $sucursales);
                $sql->orWhere('neg_nombre_corto', 'like', "%{$query}%");
                $sql->orWhere('neg_descripcion', 'like', "%{$query}%");
                $sql->orWhere('neg_ubicacion', 'like', "%{$query}%");
            })
            ->with(array('sucursales' => function($sql) use ($departamento, $municipio, $query){
                if($municipio > 0){
                    $sql->orwhere('suc_mun_fk', $municipio);
                }
                if($municipio == 0 && $departamento > 0){
                    $sql->orwhereIn('suc_mun_fk',  municipio::where('mun_dep_fk', $departamento)->pluck('mun_id'));
                }
                $sql->orWhere('suc_nombre', 'like', "%{$query}%");
                $sql->orWhere('suc_ubicacion', 'like', "%{$query}%");
            }))->paginate(5);


            // $_sql = $tmpnegocios->toSql();
            // $_sql = Str::replaceArray('?', $tmpnegocios->getBindings(), $tmpnegocios->toSql());
            // $negocios = $tmpnegocios->paginate(5);
        }
        else{
            $negocios = [];
            $sucursales = [];
        }

        return view("Web.Home.Resultados", [
            'query' => $query,
            'categoria' => $categoria,
            'departamento' => $departamento,
            'municipio' => $municipio,
            'negocios' => $negocios
        ]);
    }


    public function showNegocio(string $nombreNegocio){

        $negocio = negocio::where('neg_nombre_corto', $nombreNegocio)->first();

        return view("Web.Home.Negocio", [
            'negocio' => $negocio
        ]);
    }

    public function showSucursal(string $nombreNegocio, string $nombreSucursal){
        $negocio = negocio::where('neg_nombre_corto', $nombreNegocio)->first();
        $sucursal = sucursales::where([['suc_neg_fk', $negocio->neg_id], ['suc_nombre', $nombreSucursal]])->first();
        return view("Web.Home.Sucursal", [
            'negocio' => $negocio,
            'sucursal' => $sucursal
        ]);
    }
}
