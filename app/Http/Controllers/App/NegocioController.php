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
use DataTables;

class NegocioController extends Controller
{
    public function ListadoView(){
        return view("App.Negocios.Listado");
    }

    public function NuevoView(){
        return view("App.Negocios.Nuevo");
    }

    public function EditarView(negocio $neg){
        return view("App.Negocios.Editar",['neg'=>$neg]);
    }

    /**
     * POST
     * //$botones = '<a href="'.route("app.negocio.nuevo.post", $row->neg_id).'" class="btn btn-primary btn-sm btn-icon" title="Ver Detalles"><i class="mdi mdi-view-day"></i></a>';
     */
    public function ListadoNegocio(Request $request){
        return Datatables::of(negocio::all())
           ->addIndexColumn()
           ->addColumn('action', function($row){
            $botones = '<a href="'.route("app.negocio.edicion.get", $row->neg_id).'" class="btn btn-secondary btn-sm btn-icon" title="Editar">Editar</a>';
            $botones = $botones."<a href=\"javascript:BorrarRegistro('".route("app.negocio.eliminar.post", $row->neg_id)."', '".htmlspecialchars(addslashes($row->neg_nombre_completo))."')\" class='btn btn-danger btn-sm btn-icon rounded-0 mx-0 text-white' title='Eliminar'>Eliminar</a>";
            return $botones;
            })
            ->editColumn('neg_servicio_dominicio', function(negocio $neg) {
                    return '<span class="badge badge-'.( $neg->neg_servicio_dominicio ? "success" : "danger" ).' badge-pill">'.( $neg->neg_servicio_dominicio ? "SI" : "NO" ).' </span>';
                })
            ->rawColumns(['neg_servicio_dominicio','action'])
            ->make(true);
   }

    public function Nuevo(Request $request)
    {
        try{
            $data = $request->all();
            Validator::make($request->all(), [
                'nombre_completo' => ['required', 'max:250'],
                 'nombre_corto' => ['required','max:250'],
                 'descripcion' => ['max:250'],
                 'departamento' => ['required'],
                 'municipio' => ['required'],
                 'ubicacion' => ['max:250'],
                 'logo' => ['max:250'],
                 'categoria' => ['required'],

                 'telefono1' => ['required','max:250'],
                 'telefono2' => ['max:250'],
                 'correo1' => ['required','max:250','email'],
                 'correo2' => ['max:250','email','nullable'],
                 'pagina' => ['max:250','url','nullable'],
                 'facebook' => ['max:250','url','nullable'],
                 'google_maps' => ['max:250','url','nullable'],
                 'whatsapp' => ['max:250'],
                 'direccion' => ['max:250'],

                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
            ])->validate();

            $negid = 0;
            $conid = 0;
            $horid = 0;
            $fpaid = 0;
            $parid = 0;
            $covid = 0;
            DB::transaction(function () use ($data, &$negid, &$conid, &$horid, &$fpaid, &$parid, &$covid){

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

                $ef = false;
                $tj = false;
                foreach ($data['formaspago'] as $fp) {
                    if($fp == "EF"){
                        $ef = true;
                    }
                    if($fp == "TJ"){
                        $tj = true;
                    }
                }

                $fpaid = DB::table('neg_formas_pago')->insertGetId([
                    'fpa_efectivo' => $ef,
                    'fpa_tarjetas' => $tj,
                ]);

                $parid = DB::table('neg_parqueos')->insertGetId([
                    'par_precio_carros' => Util::MONEDA($data['preciocarros']),
                    'par_precio_motos' =>  Util::MONEDA($data['preciomotos']),
                    'par_precio_discapacitados' =>  Util::MONEDA($data['preciodiscapacitados']),
                    'par_cantidad_carros' => isset($data['cantidadcarros'])?$data['cantidadcarros']:0,
                    'par_cantidad_motos' => isset($data['cantidadmotos'])?$data['cantidadmotos']:0,
                    'par_cantidad_discapacitados' => isset($data['cantidaddiscapacitados'])?$data['cantidaddiscapacitados']:0,
                ]);

                $covid = DB::table('neg_covid19')->insertGetId([
                    'cov_mascarilla' => isset($data['mascarilla'])?true:false,
                    'cov_guantes' => isset($data['guantes'])?true:false,
                    'cov_procedimiento' => $data['procedimiento'],
                ]);

                $negid = DB::table('neg_negocio')->insertGetId([
                    'neg_usu_fk' => 1,
                    'neg_mun_fk' => $data['municipio'],
                    'neg_nombre_completo' => $data['nombre_completo'],
                    'neg_nombre_corto' => $data['nombre_corto'],
                    'neg_descripcion' => $data['descripcion'],
                    'neg_ubicacion' => $data['ubicacion'],
                    'neg_servicio_dominicio' =>  isset($data['servicio_domicilio'])?true:false,
                    'neg_cat_fk' => $data['categoria'],
                    'neg_hor_fk' => $horid,
                    'neg_con_fk' => $conid,
                    'neg_cov_fk' => $covid,
                    'neg_fpa_fk' => $fpaid,
                    'neg_par_fk' => $parid,
                ]);

                //Almacena las imagenes en la carpeta pública y luego crea el registro de base de datos
                /*
                if($request->file('imagenes')){
                        $i = 0;
                        foreach ($request->file('imagenes') as $img) {
                            $img_nombre = time().'_'.$i.'.'.$img->getClientOriginalExtension();
                            $img->move(public_path('imagenes/negocios'), $img_nombre);
                            DB::table('neg_imagenes')->insertGetId([
                                'ima_neg_fk' => $negid,
                                'ima_nombre' => $img_nombre
                            ]);
                            $i++;
                        }
                    }
                    */
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


    public function Editar(negocio $neg)
    {
        try{
            $data = request()->all();
            Validator::make($data, [
                'nombre_completo' => ['required', 'max:250'],
                 'nombre_corto' => ['required','max:250'],
                 'descripcion' => ['max:250'],
                 'departamento' => ['required'],
                 'municipio' => ['required'],
                 'ubicacion' => ['max:250'],
                 'logo' => ['max:250'],
                 'categoria' => ['required'],

                 'telefono1' => ['required','max:250'],
                 'telefono2' => ['max:250'],
                 'correo1' => ['required','max:250','email'],
                 'correo2' => ['max:250','email','nullable'],
                 'pagina' => ['max:250','url','nullable'],
                 'facebook' => ['max:250','url','nullable'],
                 'google_maps' => ['max:250','url','nullable'],
                 'whatsapp' => ['max:250'],
                 'direccion' => ['max:250'],

                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
                 'telefono2' => ['max:250'],
            ])->validate();

            $negid = 0;
            $conid = 0;
            $horid = 0;
            $fpaid = 0;
            $parid = 0;
            $covid = 0;
            DB::transaction(function () use ($data, &$neg){

                DB::table('neg_contacto')
                ->where('con_id', $neg->neg_con_fk)
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
                ->where('hor_id', $neg->neg_hor_fk)
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

                $ef = false;
                $tj = false;
                foreach ($data['formaspago'] as $fp) {
                    if($fp == "EF"){
                        $ef = true;
                    }
                    if($fp == "TJ"){
                        $tj = true;
                    }
                }

                DB::table('neg_formas_pago')
                ->where('fpa_id', $neg->neg_fpa_fk)
                ->update([
                    'fpa_efectivo' => $ef,
                    'fpa_tarjetas' => $tj,
                ]);

                DB::table('neg_parqueos')
                ->where('par_id', $neg->neg_par_fk)
                ->update([
                    'par_precio_carros' => Util::MONEDA($data['preciocarros']),
                    'par_precio_motos' =>  Util::MONEDA($data['preciomotos']),
                    'par_precio_discapacitados' =>  Util::MONEDA($data['preciodiscapacitados']),
                    'par_cantidad_carros' => isset($data['cantidadcarros'])?$data['cantidadcarros']:0,
                    'par_cantidad_motos' => isset($data['cantidadmotos'])?$data['cantidadmotos']:0,
                    'par_cantidad_discapacitados' => isset($data['cantidaddiscapacitados'])?$data['cantidaddiscapacitados']:0,
                ]);

               DB::table('neg_covid19')
                ->where('cov_id', $neg->neg_cov_fk)
                ->update([
                    'cov_mascarilla' => isset($data['mascarilla'])?true:false,
                    'cov_guantes' => isset($data['guantes'])?true:false,
                    'cov_procedimiento' => $data['procedimiento'],
                ]);

                DB::table('neg_negocio')
                ->where('neg_id', $neg->neg_id)
                ->update([
                    'neg_mun_fk' => $data['municipio'],
                    'neg_nombre_completo' => $data['nombre_completo'],
                    'neg_nombre_corto' => $data['nombre_corto'],
                    'neg_descripcion' => $data['descripcion'],
                    'neg_ubicacion' => $data['ubicacion'],
                    'neg_servicio_dominicio' =>  isset($data['servicio_domicilio'])?true:false,
                    'neg_cat_fk' => $data['categoria'],
                ]);

                //Almacena las imagenes en la carpeta pública y luego crea el registro de base de datos
                /*
                if($request->file('imagenes')){
                        $i = 0;
                        foreach ($request->file('imagenes') as $img) {
                            $img_nombre = time().'_'.$i.'.'.$img->getClientOriginalExtension();
                            $img->move(public_path('imagenes/negocios'), $img_nombre);
                            DB::table('neg_imagenes')->insertGetId([
                                'ima_neg_fk' => $negid,
                                'ima_nombre' => $img_nombre
                            ]);
                            $i++;
                        }
                    }
                    */
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

    public function EliminarNegocio(negocio $neg){
        $ret = new RetornoAjax();
        try{
             $neg->delete();
             DB::table('neg_contacto')->where('con_id', $neg->neg_con_fk)->delete();
             DB::table('neg_horario')->where('hor_id', $neg->neg_hor_fk)->delete();
             DB::table('neg_formas_pago')->where('fpa_id', $neg->neg_fpa_fk)->delete();
             DB::table('neg_parqueos')->where('par_id', $neg->neg_par_fk)->delete();
             DB::table('neg_covid19')->where('cov_id', $neg->neg_cov_fk)->delete();
             $ret->DefinirValores(true);
        }catch (QueryException $e){
             $ret->DefinirValores(false, $e->getCode() == "23000"?"El registro tiene transacciones en el sistema. No es posible borrarlo": $e->getMessage(),$e->getCode());
        }
        return $ret->ObtenerRetorno();
    }
}
