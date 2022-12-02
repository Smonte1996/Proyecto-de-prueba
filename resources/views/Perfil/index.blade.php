@extends('layouts.app')

@section('titulos')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
     <div class="md:w-1/2 bg-white shadow p-6">
        <form action="" class="mt-10 md:mt-0">
            <div class="mb-5">
                <label for="username" class="mb:2 block uppercase text-gray-500 font-bold">
                    Nombre de Usuario
                </label>
                <input type="text" class="border p-3 w-full rounded-lg" id="username" name="username" placeholder="" value="{{ auth()->user()->username }}">
                @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
            </div>
          
            <div class="mb-5">
                <label for="imagen" class="mb:2 block uppercase text-gray-500 font-bold">
                    Imagen de Perfil
                </label>
                <input type="file" class="border p-3 w-full rounded-lg" id="imagen" name="imagen" accept=".jpg, ,jpeg, .png">
                @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
            </div>  
        </form>
     </div>
    </div>
@endsection