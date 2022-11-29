<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistarController extends Controller
{
    //
    public function registar()
    {
        return view('Autenticar.Registar');
    }
  
    public function store(Request $request)
    {
      //Modificar el Request 
     $request -> request -> add(['username'=> Str::slug($request->username)]);

      //validacion de campos al ingresar a la base
      $this->validate($request,[
        'name' => 'required|max:15',
        'username' => 'required|max:8|unique:users',
        'email' => 'required|email|unique:users',
        'cedula'=> 'required|max:10',
        'password' => 'required|min:5|max:10|confirmed'
      ]);
      //Guardar los datos a la base
      User::create([
        'name'=> $request->name,
        'username'=> $request->username,
        'email'=> $request->email,
        'cedula' => $request->cedula,
        'password'=> Hash::make($request->password)//me se agrega un hash en le password.
      ]);

      //Autenticar a usuario
      auth()->attempt([
         'email'=>$request->email,
         'password'=>$request->password
      ]);

      //otra forma de autenticar 
     //auth()->attempt($request->only('email','password'));

    //redireccionar al usuario
     return redirect()->route('posts.index');
    }
}
