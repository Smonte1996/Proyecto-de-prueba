<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    //
public function __construct()
{
    $this->middleware('auth')->except(['show','index']);
}

public function index(User $user)
{ 
    $posts = Post::where('user_id', $user->id)->latest()->paginate(8); //mandamos la visializacion de los posts exatrallendo el user_id y el paginado 

    return view('dashboard',[
        'user' => $user,
        'posts' => $posts 
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
//     otra froma de crear un registro a la base
//    $request->user()->posts()->create([
//     'tirulo' => $request->tirulo,
//     'descripcion' => $request->descripcion,
//     'imagen' =>$request->imagen,
//     'user_id' =>auth()->user()->id
//    ]);

   Post::create([
    'tirulo' => $request->tirulo,
    'descripcion' => $request->descripcion,
    'imagen' =>$request->imagen,
    'user_id' =>auth()->user()->id
   ]);

  return redirect()->route('pots.index', auth()->user()->username); //redireccionamos a la pagina de dashboard y se pasa el user y username para q tenga el username en la url.
}
//se crea el metodo show para mostrar la vista y tbm se pasa el user y post para la url.
public function show(User $user, Post $post)
{
    return view('Posts.show',[
        'user'=> $user,
        'post'=> $post
    ]);
}
//se crea el delete llamando el methodo de policy para hacer del delete.
public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    $post->delete();

    //eliminar la imagen
    $imagen_path = public_path('uploads/'. $post->imagen);

    if (File::exists($imagen_path)) {
        unlink($imagen_path);
    }

    return redirect()->route('pots.index', auth()->user()->username); //se redirecciona al muro al eliminar una publicacion.
}
}
