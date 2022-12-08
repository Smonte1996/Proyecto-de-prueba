<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id',$ids)->paginate(16);
        return view('home');
    }
}
