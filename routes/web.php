<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistarController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\perfilController;

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
//routa para el perfil
Route::get('/editar-perfil',[perfilController::class,'index'])->name('Perfil.index');
Route::post('/editar-perfil',[perfilController::class,'store'])->name('Perfil.shore');
//la ruta de cierre e session
route::post('/logout', [LogoutController::class,'store'])->name('logout');
// la ruta del muro de la pagina | manda el parametro de usermane es lo que reflija en la url.
Route::get('/{user:username}',[PostsController::class, 'index'])->name('pots.index');
//se crea la ruta para crear un post
Route::get('/posts/create',[PostsController::class, 'create'])->name('posts.create');
//se crea la ruta de guarado de las publicaciones.
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
//se crea la ruta para poder abrir lso posts y q aparesca la interfaz de titulo y descripcion.
Route::get('/{user:username}/posts/{post}',[PostsController::class, 'show'])->name('posts.show');
//se crea la ruta para poder abrir los comentarios y q aparesca la interfaz de titulo y descripcion.
Route::post('/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
//se crea la ruta para el delete de la publicacion.
Route::delete('/posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');
//se crea la ruta para subir la imagen en dropzone
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagen.store');
//se crea la ruta para almacenar los likes 
Route::post('/posts/{post}/likes',[LikeController::class, 'store'])->name('posts.likes.store');
//se crea la ruta para eliminar los likes 
Route::delete('/posts/{post}/likes',[LikeController::class, 'destroy'])->name('posts.likes.destroy');
