<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
public function __construct()
{
    $this->middleware('auth');
}

public function index(User $User)
{ 
    return view('dashboard', [
        'User' => $User,
    ]);
}
}
