<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
       $post->likes()->create([
      'user_id' => $request->user()->id
]);
      return back(); //vuelve a la misma pagina
    }

    //se crea el delete para eliminar lo linkes
    public function destroy(Request $request, Post $post)
    {
       $request->user()->likes()->where('post_id', $post->id)->delete();

       return back();
    }
}
