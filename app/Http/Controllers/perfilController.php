<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class perfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       return view('Perfil.index');
    }
    public function store(Request $request)
    {
        //Modificar el Request 
     $request -> request -> add(['username'=> Str::slug($request->username)]);

     //validacion de campos al ingresar a la base
        $this->validate($request, [
         'username'=>['required','max:8','unique:users,username,'.auth()->user()->id,'not_in:Twitter,editar-perfil'],
        ]);
        if ($request->imagen) {

        $imagen = $request -> file('imagen');

        $nombreImagen = Str::uuid(). "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('Perfiles'). '/'. $nombreImagen;
        $imagenServidor ->save($imagenPath);
        }
         //guardar cambios 
         $usuario = User::find(auth()->user()->id);
         $usuario->username = $request->username;
         $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
         $usuario->save();

        // Redireccionar
        return redirect()->route('pots.index', $usuario->username);
    }
    
}
