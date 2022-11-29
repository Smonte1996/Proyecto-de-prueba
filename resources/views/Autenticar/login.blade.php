@extends('layouts.app')

@section('titulos')
    Inicio sesión en DevsTraGram
@endsection

@section('contenido')
   <div class="md:flex md:justify-center md:gap-10 md:items-center">
   <div class="md:w-6/12 p-5">
    <img src="{{asset('img/react.png')}}" alt="Imagen login">
    </div> 
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form  action="{{route('login')}}" method="POST">
        @csrf
       @if (session('mensaje'))
       <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{session('mensaje')}}</p> 
       @endif
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
          <input type="checkbox" name="remember"> <label class="text-gray-500 font-bold text-sm"> Mantener mi sesión abierta </label>
        </div>

        <input type="submit" value="Iniciar Sesion" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
      </form>
    </div>
</div>    

@endsection