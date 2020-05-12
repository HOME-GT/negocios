<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\usuario;

class RegisterController extends Controller
{
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function RegistroView()
    {
         return view("auth.register");
    }


    public function Crear(Request $request){
        try{
             $data = $request->all();
             Validator::make($request->all(), [
                  'nombres' => ['required', 'string', 'max:50'],
                  'apellidos' => ['nullable','string', 'max:50'],
                  'cui' => ['required', 'min:13', 'max:20', 'unique:seg_usuarios,usu_cui', 'regex:/^[0-9]{4}\\s?[0-9]{5}\\s?[0-9]{4}$/u'],
                  'correo' => ['required', 'string', 'email', 'max:50', 'unique:seg_usuarios,usu_correo'],
                  'telefono' => ['nullable', 'max:20'],
                  'clave' => ['required', 'string', 'min:8', 'max:20', 'same:clave_confirmacion'],
                  'acuerdos' => ['required']
             ])->validate();
             $usuario = usuario::create([
                  'usu_nombres' => $data['nombres'],
                  'usu_apellidos' => $data['apellidos'],
                  'usu_correo' => $data['correo'],
                  'usu_cui' => $data['cui'],
                  'usu_clave' => Hash::make($data['clave']),
                  'usu_telefono' => $data['telefono'],
                  'usu_estado' =>  true,
                  'usu_admin' => false,
             ]);
             auth()->login($usuario);
             return redirect()->route("web.home")->with('success', true);
        }
        catch(QueryException $e){
             return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
        }
        catch(\Exeption $e){
             return redirect()->back()->with(['success' => false, 'message' => $e->getMessage()]);
        }
   }

}
