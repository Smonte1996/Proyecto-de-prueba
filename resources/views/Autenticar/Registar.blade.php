@extends('layouts.app')

@section('titulos')
    Registrarse en DevStraGram
@endsection

@section('contenido')
   <div class="md:flex md:justify-center md:gap-10 md:items-center">
   <div class="md:w-6/12 p-5">
    <img src="{{asset('img/16.jpg')}}" alt="Imagen registro de usuario">
    </div> 
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{route('Register')}}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="" class="mb:2 block uppercase text-gray-500 font-bold">
                Nombre
            </label>
            <input type="text" class="border p-3 w-full rounded-lg" id="name" name="name" placeholder="Tu nombre" value="{{ old('name')}}">
            @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="" class="mb:2 block uppercase text-gray-500 font-bold">
                Username
            </label>
            <input type="text" class="border p-3 w-full rounded-lg" id="username" name="username" placeholder="Tu Usuario" value="{{ old('username')}}">
            @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-5">
            <label for="" class="mb:2 block uppercase text-gray-500 font-bold">
                Cedula
            </label>
            <input type="number" class="border p-3 w-full rounded-lg" id="cedula" name="cedula" placeholder="Tu cedula" value="{{ old('cedula')}}">
            @error('cedula')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-5">
            <label for="" class="mb:2 block uppercase text-gray-500 font-bold">
                Correo
            </label>
            <input type="email" class="border p-3 w-full rounded-lg" id="email" name="email" placeholder="Tu correo" value="{{ old('email')}}">
            @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-5">
            <label for="" class="mb:2 block uppercase text-gray-500 font-bold">
              Contraseña
            </label>
            <input type="password" class="border p-3 w-full rounded-lg" id="password" name="password" placeholder="contraseña">
            @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-5">
            <label for="" id="password_confirmation" class="mb:2 block uppercase text-gray-500 font-bold">
            Confirmar contraseña
            </label>
            <input type="password" class="border p-3 w-full rounded-lg" id="password_confirmation" name="password_confirmation" placeholder="Repetir contraseña">
        </div>

        <input type="submit" value="Crear cuenta" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
      </form>
    </div>
</div>    

@endsection