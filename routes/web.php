<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//ruta del controlador para el formulario de registro 
Route::get('/Register',[RegistarController::class, 'registar'])->name('Register');
Route::post('/Register',[RegistarController::class, 'store']);
// las rutas de login tanto post(de validacion) y get(de vista).
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
//la ruta de cierre e session
route::post('/logout', [LogoutController::class,'store'])->name('logout');
// la ruta del muro de la pagina | manda el parametro de usermane es lo que reflija en la url.
Route::get('/{user:username}',[PostsController::class, 'index'])->name('pots.index');
//se crea la ruta para crear un post
Route::get('/posts/create',[PostsController::class, 'create'])->name('posts.create');
//se crea la ruta de guarado de las publicaciones.
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
//se crea la ruta para subir la imagen en dropzone
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagen.store');
