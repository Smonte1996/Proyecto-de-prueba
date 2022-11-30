<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //se crea el store para poder guardar la url de la imagen en la base y se le da tamaño.
    public function store(Request $request)
    {
        $imagen = $request -> file('file');

        $nombreImagen = Str::uuid(). "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('uploads'). '/'. $nombreImagen;
        $imagenServidor ->save($imagenPath);

        return response()->json(['imagen'=>$nombreImagen]);
    }
}
