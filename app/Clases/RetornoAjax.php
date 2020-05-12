<?php
// Clase para el retorno de un petición de ajax
namespace App\Clases;

class RetornoAjax
{

     private $retorno = array();

     public function __construct($exito=false, $mensaje="", $codigo=0, $data=null)
     {
          $this->retorno["exito"] = $exito;
          $this->retorno["mensaje"] = $mensaje;
          $this->retorno["codigo"] = $codigo;
          $this->retorno["data"] = $data;
     }

     public function DefinirValores($exito=false, $mensaje="", $codigo=0, $data=null){
          $this->retorno["exito"] = $exito;
          $this->retorno["mensaje"] = $mensaje;
          $this->retorno["codigo"] = $codigo;
          $this->retorno["data"] = $data;
     }

     public function ObtenerRetorno(){
          return  json_encode($this->retorno);
     }
}