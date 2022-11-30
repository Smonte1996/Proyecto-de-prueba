<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('Autenticar.login');
    }
    public function store(Request $request)
    {
    //Atentincando al uusuario en le login
    $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required'  
    ]);

    if(!auth()->attempt($request->only('email','password'), $request->remember)){
        return back()->with('mensaje','Credenciales Incorrectas');
    }

    return redirect() -> route('pots.index', ['user' => auth()->user()->username]); //se redirecciona se envia la ruta y tbm se manda el paramtro de para poder obtener ese dato.

    }
}
