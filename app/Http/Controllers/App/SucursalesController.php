<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Clases\Util;
use App\Clases\RetornoAjax;
use App\Models\negocio;
use App\Models\sucursales;
use DataTables;

class SucursalesController extends Controller
{
    public function ListadoView(negocio $neg){
        return view("App.Sucursales.Listado", ['neg'=>$neg]);
    }

    public function NuevoView(negocio $neg){
        return view("App.Sucursales.Nuevo", ['neg'=>$neg]);
    }

    public function EditarView(sucursales $suc){
        return view("App.Sucursales.Editar",['suc'=>$suc]);
    }


    /**
     * POST
     */
    public function ListadoSucursal(negocio $neg){
        return Datatables::of(sucursales::where("suc_neg_fk", $neg->neg_id)->get())
           ->addIndexColumn()
           ->addColumn('action', function($row){
            $botones = '<a href="'.route("app.sucursales.edicion.get", $row->suc_id).'" class="btn btn-secondary btn-sm rounded-0" title="Editar">Editar</a>';
            $botones = $botones."<a href=\"javascript:BorrarRegistro('".route("app.sucursales.eliminar.post", $row->suc_id)."', '".htmlspecialchars(addslashes($row->suc_nombre))."')\" class='btn btn-danger btn-sm rounded-0 mx-0 text-white' title='Eliminar'>Eliminar</a>";
            return $botones;
            })
            ->make(true);
   }

    public function Nuevo(Request $request)
    {
        try{
            $data = $request->all();
            Validator::make($request->all(), [
                 'nombre_completo' => ['required', 'max:250'],
                 'ubicacion' => ['max:250'],

                 'telefono1' => ['required','max:250'],
                 'telefono2' => ['max:250'],
                 'correo1' => ['required','max:250','email'],
                 'correo2' => ['max:250','email','nullable'],
                 'pagina' => ['max:250','url','nullable'],
                 'facebook' => ['max:250','url','nullable'],
                 'google_maps' => ['max:250','url','nullable'],
                 'whatsapp' => ['max:250'],
                 'direccion' => ['max:250'],
            ])->validate();

            $conid = 0;
            $horid = 0;
            DB::transaction(function () use ($data, &$conid, &$horid){

                $conid = DB::table('neg_contacto')->insertGetId([
                    'con_telefono1' => $data['telefono1'],
                    'con_telefono2' => $data['telefono2'],
                    'con_correo1' => $data['correo1'],
                    'con_correo2' => $data['correo2'],
                    'con_facebook' => $data['facebook'],
                    'con_pagina' => $data['pagina'],
                    'con_google_maps' => $data['google_maps'],
                    'con_whatsapp' => $data['whatsapp'],
                    'con_direccion' => $data['direccion'],
                ]);

                $horid = DB::table('neg_horario')->insertGetId([
                    'hor_ini_lun' => Util::HOR_MIN_SEG(isset($data['inicio_lunes'])?$data['inicio_lunes']:""),
                    'hor_fin_lun' => Util::HOR_MIN_SEG(isset($data['fin_lunes'])?$data['fin_lunes']:""),
                    'hor_cer_lun' => isset($data['cerrado_lunes'])?true:false,
                    'hor_ini_mar' => Util::HOR_MIN_SEG(isset($data['inicio_martes'])?$data['inicio_martes']:""),
                    'hor_fin_mar' => Util::HOR_MIN_SEG(isset($data['fin_martes'])?$data['fin_martes']:""),
                    'hor_cer_mar' => isset($data['cerrado_martes'])?true:false,
                    'hor_ini_mie' => Util::HOR_MIN_SEG(isset($data['inicio_miercoles'])?$data['inicio_miercoles']:""),
                    'hor_fin_mie' => Util::HOR_MIN_SEG(isset($data['fin_miercoles'])?$data['fin_miercoles']:""),
                    'hor_cer_mie' => isset($data['cerrado_miercoles'])?true:false,
                    'hor_ini_jue' => Util::HOR_MIN_SEG(isset($data['inicio_jueves'])?$data['inicio_jueves']:""),
                    'hor_fin_jue' => Util::HOR_MIN_SEG(isset($data['fin_jueves'])?$data['fin_jueves']:""),
                    'hor_cer_jue' => isset($data['cerrado_jueves'])?true:false,
                    'hor_ini_vie' => Util::HOR_MIN_SEG(isset($data['inicio_viernes'])?$data['inicio_viernes']:""),
                    'hor_fin_vie' => Util::HOR_MIN_SEG(isset($data['fin_viernes'])?$data['fin_viernes']:""),
                    'hor_cer_vie' => isset($data['cerrado_viernes'])?true:false,
                    'hor_ini_sab' => Util::HOR_MIN_SEG(isset($data['inicio_sabado'])?$data['inicio_sabado']:""),
                    'hor_fin_sab' => Util::HOR_MIN_SEG(isset($data['fin_sabado'])?$data['fin_sabado']:""),
                    'hor_cer_sab' => isset($data['cerrado_sabado'])?true:false,
                    'hor_ini_dom' => Util::HOR_MIN_SEG(isset($data['inicio_domingo'])?$data['inicio_domingo']:""),
                    'hor_fin_dom' => Util::HOR_MIN_SEG(isset($data['fin_domingo'])?$data['fin_domingo']:""),
                    'hor_cer_dom' =>isset($data['cerrado_domingo'])?true:false,
                ]);

                DB::table('neg_sucursales')->insertGetId([
                    'suc_nombre' => $data['nombre_completo'],
                    'suc_neg_fk' => $data['negocio'],
                    'suc_mun_fk' => $data['municipio'],
                    'suc_hor_fk' => $horid,
                    'suc_ubicacion' => $data['ubicacion'],
                    'suc_con_fk' => $conid,
                ]);

           });
            return redirect()->back()->with('success', true);
       }
       catch(QueryException $e){
            return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
       }
       catch(\Exeption $e){
            return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
       }
    }


    public function Editar(sucursales $suc)
    {
        try{
            $data = request()->all();
            Validator::make($data, [
                'nombre_completo' => ['required', 'max:250'],
                'ubicacion' => ['max:250'],

                'telefono1' => ['required','max:250'],
                'telefono2' => ['max:250'],
                'correo1' => ['required','max:250','email'],
                'correo2' => ['max:250','email','nullable'],
                'pagina' => ['max:250','url','nullable'],
                'facebook' => ['max:250','url','nullable'],
                'google_maps' => ['max:250','url','nullable'],
                'whatsapp' => ['max:250'],
                'direccion' => ['max:250'],
           ])->validate();

            DB::transaction(function () use ($data, &$suc){

                DB::table('neg_contacto')
                ->where('con_id', $suc->suc_con_fk)
                ->update([
                    'con_telefono1' => $data['telefono1'],
                    'con_telefono2' => $data['telefono2'],
                    'con_correo1' => $data['correo1'],
                    'con_correo2' => $data['correo2'],
                    'con_facebook' => $data['facebook'],
                    'con_pagina' => $data['pagina'],
                    'con_google_maps' => $data['google_maps'],
                    'con_whatsapp' => $data['whatsapp'],
                    'con_direccion' => $data['direccion'],
                ]);

                DB::table('neg_horario')
                ->where('hor_id', $suc->suc_hor_fk)
                ->update([
                    'hor_ini_lun' => Util::HOR_MIN_SEG(isset($data['inicio_lunes'])?$data['inicio_lunes']:""),
                    'hor_fin_lun' => Util::HOR_MIN_SEG(isset($data['fin_lunes'])?$data['fin_lunes']:""),
                    'hor_cer_lun' => isset($data['cerrado_lunes'])?true:false,
                    'hor_ini_mar' => Util::HOR_MIN_SEG(isset($data['inicio_martes'])?$data['inicio_martes']:""),
                    'hor_fin_mar' => Util::HOR_MIN_SEG(isset($data['fin_martes'])?$data['fin_martes']:""),
                    'hor_cer_mar' => isset($data['cerrado_martes'])?true:false,
                    'hor_ini_mie' => Util::HOR_MIN_SEG(isset($data['inicio_miercoles'])?$data['inicio_miercoles']:""),
                    'hor_fin_mie' => Util::HOR_MIN_SEG(isset($data['fin_miercoles'])?$data['fin_miercoles']:""),
                    'hor_cer_mie' => isset($data['cerrado_miercoles'])?true:false,
                    'hor_ini_jue' => Util::HOR_MIN_SEG(isset($data['inicio_jueves'])?$data['inicio_jueves']:""),
                    'hor_fin_jue' => Util::HOR_MIN_SEG(isset($data['fin_jueves'])?$data['fin_jueves']:""),
                    'hor_cer_jue' => isset($data['cerrado_jueves'])?true:false,
                    'hor_ini_vie' => Util::HOR_MIN_SEG(isset($data['inicio_viernes'])?$data['inicio_viernes']:""),
                    'hor_fin_vie' => Util::HOR_MIN_SEG(isset($data['fin_viernes'])?$data['fin_viernes']:""),
                    'hor_cer_vie' => isset($data['cerrado_viernes'])?true:false,
                    'hor_ini_sab' => Util::HOR_MIN_SEG(isset($data['inicio_sabado'])?$data['inicio_sabado']:""),
                    'hor_fin_sab' => Util::HOR_MIN_SEG(isset($data['fin_sabado'])?$data['fin_sabado']:""),
                    'hor_cer_sab' => isset($data['cerrado_sabado'])?true:false,
                    'hor_ini_dom' => Util::HOR_MIN_SEG(isset($data['inicio_domingo'])?$data['inicio_domingo']:""),
                    'hor_fin_dom' => Util::HOR_MIN_SEG(isset($data['fin_domingo'])?$data['fin_domingo']:""),
                    'hor_cer_dom' =>isset($data['cerrado_domingo'])?true:false,
                ]);

                DB::table('neg_sucursales')
                ->where('suc_id', $suc->suc_id)
                ->update([
                    'suc_nombre' => $data['nombre_completo'],
                    'suc_mun_fk' => $data['municipio'],
                    'suc_ubicacion' => $data['ubicacion'],
                ]);
            });
            return redirect()->back()->with('success', true);
        }
        catch(QueryException $e){
            return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
        }
        catch(\Exeption $e){
            return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function EliminarSucursal(sucursales $suc){
        $ret = new RetornoAjax();
        try{
             $suc->delete();
             $ret->DefinirValores(true);
        }catch (QueryException $e){
             $ret->DefinirValores(false, $e->getCode() == "23000"?"El registro tiene transacciones en el sistema. No es posible borrarlo": $e->getMessage(),$e->getCode());
        }
        return $ret->ObtenerRetorno();
    }

}
