@extends('layouts.app')

@section('titulos')
    Crear una Nueva Publicacion
@endsection
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />   
@endpush
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
           <form action="{{ route('imagen.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
          @csrf
        </form>
        </div>

        <div class="md:w-1/2 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb:2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text" class="border p-3 w-full rounded-xl" id="titulo" name="tirulo" placeholder="Titulo de la Publicacion" value="{{ old('titulo')}}">
                    @error('tirulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="Descripcion" class="mb:2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea class="border p-5 w-full rounded-xl" id="Descripcion" name="descripcion" placeholder="Descripcion de la Publicacion">{{ old('Descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
               <input name="imagen" type="hidden" value="{{ old('imagen') }}">
               @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear Publicacion" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
            </form>
                </div>
        </div>
    </div>
@endsection