<?php
namespace App\Clases;

use Illuminate\Support\Facades\Auth;
use App\Models\Permiso;
use App\Models\Modulo;
use App\Models\Submodulo;
use App\Models\Usuario;

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
}