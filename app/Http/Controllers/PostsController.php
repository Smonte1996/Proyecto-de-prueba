<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
public function __construct()
{
    $this->middleware('auth');
}

public function index(User $user)
{ 
    return view('dashboard',[
        'user' => $user 
    ]);
}
//se crea la vista para crear los posts
public function create()
{
    return view('Posts.create');
}
//se crea el store para guardar los posts.
public function store(Request $request)
{
   $this->validate($request,[
   'tirulo' => 'required|max:255',
   'descripcion' => 'required',
   'imagen' => 'required'
   ]);

   Post::create([
    'tirulo' => $request->tirulo,
    'descripcion' => $request->descripcion,
    'imagen' =>$request->imagen,
    'user_id' =>auth()->user()->id
   ]);
   
  return redirect()->route('pots.index', auth()->user()->username);
}
}
