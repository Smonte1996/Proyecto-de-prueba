@extends('layouts.app')

@section('titulos')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
     <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{route('Perfil.shore') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
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
            <input type="submit" value="Guardar Cambios" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl"> 
        </form>
     </div>
    </div>
@endsection