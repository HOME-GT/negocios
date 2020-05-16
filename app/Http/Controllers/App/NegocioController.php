<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Clases\Util;

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

    /**
     * POST
     */
    public function Nuevo(Request $request)
    {
        try{
            $data = $request->all();
            Validator::make($request->all(), [
                'nombre_completo' => ['required', 'max:250'],
                 'nombre_corto' => ['max:250'],
                 'descripcion' => ['required', 'max:250'],
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

                if(!isset($data['cerrado_lunes']) || !isset($data['cerrado_martes']) || !isset($data['cerrado_miercoles']) || !isset($data['cerrado_jueves']) || !isset($data['cerrado_viernes']) || !isset($data['cerrado_sabado']) || !isset($data['cerrado_domingo']) ){
                    $horid = DB::table('neg_horario')->insertGetId([
                        'hor_fecha_creacion' => date('Y-m-d H:i:s'),
                    ]);

                    if(!isset($data['cerrado_lunes'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 1,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_lunes']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_lunes']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_martes'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 2,
                            'hord_inicio' =>Util::HOR_MIN_SEG($data['inicio_martes']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_martes']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_miercoles'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 3,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_miercoles']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_miercoles']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_jueves'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 4,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_jueves']),
                            'hord_fin' => Util::HOR_MIN_SEG( $data['fin_jueves']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_viernes'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 5,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_viernes']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_viernes']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_sabado'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 6,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_sabado']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_sabado']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                    if(!isset($data['cerrado_domingo'])){
                        DB::table('neg_horario_det')->insertGetId([
                            'hord_dia' => 7,
                            'hord_inicio' => Util::HOR_MIN_SEG($data['inicio_domingo']),
                            'hord_fin' => Util::HOR_MIN_SEG($data['fin_domingo']),
                            'hord_hor_fk' => $horid,
                        ]);
                    }
                }

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
                    'cov_mascarilla' => isset($data['mascarilla'])?false:true,
                    'cov_guantes' => isset($data['guantes'])?false:true,
                    'cov_procedimiento' => $data['procedimiento'],
                ]);

                $negid = DB::table('neg_negocio')->insertGetId([
                    'neg_usu_fk' => 1,
                    'neg_mun_fk' => $data['municipio'],
                    'neg_nombre_completo' => $data['nombre_completo'],
                    'neg_nombre_corto' => $data['nombre_corto'],
                    'neg_descripcion' => $data['descripcion'],
                    'neg_ubicacion' => $data['ubicacion'],

                    'neg_servicio_dominicio' =>  isset($data['servicio_domicilio'])?false:true,
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
}
