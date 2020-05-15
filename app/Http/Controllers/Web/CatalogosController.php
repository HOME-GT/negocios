<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Clases\RetornoAjax;

class CatalogosController extends Controller
{
    private $search = null;
    private $params = null;
    private $id = "id";
    private $name = "text";
    private $description = "description";
    private $retorno;

    public function __construct(Request $request){
         $this->retorno = new RetornoAjax();
         $this->search = ($request->query('search') ? $request->query('search') : null);
         $this->params = ($request->query('params') ? $request->query('params') : null);
    }

    /**
     * Función general de resultados globales
     */
    private function Resultados(){
         $args = func_get_args();
         if(count($args) == 4){
              /**
               * $args[0] = nombre a la tabla
               * $args[1] = nombre del campo del id
               * $args[2] = nombre del campo del nombre
               * $args[3] = nombre del campo de la descripción
              */
              $search = $this->search;
              $data = DB::table("{$args[0]}")
                             ->where(function($query) use ($search, $args){
                                  if($search != null){
                                       $query->where($args[2], 'like', "%{$search}%");
                                       $query->orWhere($args[3], 'like', "%{$search}%");
                                  }
                             })
                             ->get(["{$args[1]} AS {$this->id}", "{$args[2]} AS {$this->name}", "{$args[3]} AS {$this->description}"]);
              $this->retorno->DefinirValores(true, null, null, $data);
              return $this->retorno->ObtenerRetorno();
         }
         elseif (count($args) == 5) {
              /**
               * $args[0] = nombre a la tabla
               * $args[1] = nombre del campo del id
               * $args[2] = nombre del campo del nombre
               * $args[3] = nombre del campo de la descripción
               * $args[4] = nombre del estado en la base
              */
              $search = $this->search;
              $estado = $this->params['estado'];
              $data = DB::table("{$args[0]}")
                        ->where(function($query) use ($search, $args){
                             if($search != null){
                                  $query->where($args[2], 'like', "%{$search}%");
                                  $query->orWhere($args[3], 'like', "%{$search}%");
                             }
                        })
                        ->where(function($query) use ($estado, $args){
                             if($estado != ""){
                                  $query->where($args[4], '=', (boolean) $estado);
                             }
                        })
                        ->get(["{$args[1]} AS {$this->id}", "{$args[2]} AS {$this->name}", "{$args[3]} AS {$this->description}"]);
             $this->retorno->DefinirValores(true, null, null, $data);
             return $this->retorno->ObtenerRetorno();
         }
         elseif (count($args) == 6) {
              /**
               * $args[0] = nombre a la tabla
               * $args[1] = nombre del campo del id
               * $args[2] = nombre del campo del nombre
               * $args[3] = nombre del campo de la descripción
               * $args[4] = nombre del estado en la base
               * $args[5] = nombre del campo a relacionar con la base
              */
              $search = $this->search;
              $estado = $this->params['estado'];
              $id = $this->params['id'];
              $data = DB::table("{$args[0]}")
                   ->where(function($query) use ($search, $args){
                        if($search != null){
                             $query->where($args[2], 'like', "%{$search}%");
                             $query->orWhere($args[3], 'like', "%{$search}%");
                        }
                   })
                   ->where(function($query) use ($estado, $args){
                        if($estado != ""){
                             $query->where($args[4], '=', (boolean) $estado);
                        }
                   })
                   ->where(function($query) use ($id, $args){
                        if($id != ""){
                             $query->where($args[5], '=', $id);
                        }
                   })
                   ->get(["{$args[1]} AS {$this->id}", "{$args[2]} AS {$this->name}", "{$args[3]} AS {$this->description}"]);
             $this->retorno->DefinirValores(true, null, null, $data);
             return $this->retorno->ObtenerRetorno();
         }
         elseif (count($args) == 7) {
              /**
               * $args[0] = nombre a la tabla
               * $args[1] = nombre del campo del id
               * $args[2] = nombre del campo del nombre
               * $args[3] = nombre del campo de la descripción
               * $args[4] = nombre del estado en la base
               * $args[5] = nombre del campo a relacionar con la base
               * $args[6] = parametros extras
              */
              $search = $this->search;
              $estado = $this->params['estado'];
              $id = $this->params['id'];
              $otro = $this->params['otro'];
              $data = DB::table("{$args[0]}")
                   ->where(function($query) use ($search, $args){
                        if($search != null){
                             $query->where($args[2], 'like', "%{$search}%");
                             $query->orWhere($args[3], 'like', "%{$search}%");
                        }
                   })
                   ->where(function($query) use ($estado, $args){
                        if($estado != ""){
                             $query->where($args[4], '=', (boolean) $estado);
                        }
                   })
                   ->where(function($query) use ($otro, $args){
                        if($otro != ""){
                             $a = explode(";", $otro);
                             foreach ($a as $aa) {
                                  if (strpos($aa, "=") === true){
                                       $b = explode("=", $aa);
                                       $query->where($b[0], '=', $b[1]);
                                  }
                                  elseif(strpos($aa, ">") == true){
                                       $b = explode(">", $aa);
                                       $query->where($b[0], '>', $b[1]);
                                  }
                             }
                        }
                   })
                   ->get(["{$args[1]} AS {$this->id}", "{$args[2]} AS {$this->name}", "{$args[3]} AS {$this->description}"]);
             $this->retorno->DefinirValores(true, null, null, $data);
             return $this->retorno->ObtenerRetorno();
         }
         elseif (count($args) == 1) {
              /**
               * $args[0] = array de resultados
              */
              $this->retorno->DefinirValores(true, null, null, $args[0]);
              return $this->retorno->ObtenerRetorno();
         }
         else{
              $this->retorno->DefinirValores(true, null, null, null);
              return $this->retorno->ObtenerRetorno();
         }
    }


    public function GetDepartamentos(){
        return $this->Resultados("cat_departamento", "dep_id", "dep_nombre", "dep_codigo", "dep_estado", "dep_pais_fk");
    }
    public function GetMunicipios(){
        return $this->Resultados("cat_municipio", "mun_id", "mun_nombre", "mun_codigo", "mun_estado", "mun_dep_fk");
    }

    public function GetCategorias(){
        return $this->Resultados("cat_categoria", "cat_id", "cat_nombre", "cat_descripcion", "cat_estado");
    }

    public function GetFormaspago(){
        return $this->Resultados([["id"=>"EF", "name"=>"Efectivo"], ["id"=>"TC", "name"=>"Tarjetas"]]);
    }
}
