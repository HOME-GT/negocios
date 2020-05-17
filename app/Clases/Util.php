<?php
namespace App\Clases;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\horario;

class Util
{
     public function __construct()
     {
     }

     public static function HOR_MIN_SEG($date){
        if ( $date == ""){
            $time = "00:00:00";
        }else{
            $timeType = explode(" ", $date);
            $timeItems = explode(":", $timeType[0]);
            if($timeType[1] == "PM"){
                $timeItems[0] += 12;
            }
            $time = implode(":", $timeItems);
            $time .= ":00";
        }
        return $time;
     }

     public static function MONEDA($valor){
        if(!empty($valor)){
            $tmp = explode(".", $valor);
            $tmp[0] = str_replace("Q", "", $tmp[0]);
            $tmp[0] = str_replace(",", "", $tmp[0]);

            if(count($tmp) == 1){
                 return $tmp[0];
            }
            else if(count($tmp) == 2){
                 return "{$tmp[0]}.{$tmp[1]}";
            }
       }
       return "0";
     }


     /**
      * funcion que retorna el horario de un día específico pasando el id del mismo
      */
     public static function HORARIO_DEL_DIA(int $id){
        $dias = ['dom', 'lun', 'mar', 'mie', 'jue', 'vie', 'sab'];
        return horario::where('hor_id', $id)->select("hor_ini_{$dias[date("w")]} AS inicio", "hor_fin_{$dias[date("w")]} AS fin", "hor_cer_{$dias[date("w")]} AS cerrado")->first();
     }


     public static function ESTA_ABIERTO($inicio, $fin){
        $inicio = date('U', strtotime($inicio));
        $fin = date('U',strtotime($fin));
        $now = date('U');
        return ($now >= $inicio) && ($now < $fin);
    }

    /**
     * Función para retornar el formato de las horas
     */
    public static function FH($hora){
        return date('h:iA', strtotime($hora));
    }
}
