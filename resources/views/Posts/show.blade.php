@extends('layouts.app')

@section('titulos')
    {{$post->tirulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
        <img src="{{asset('uploads') .'/'. $post->imagen}}" alt="Imagen de posts">

        <div class="p-3 flex items-center gap-4">
            @auth
            @if ($post->checklike(auth()->user()))
            <form action="{{route('posts.likes.destroy', $post)}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="my-4">
                    <button class="" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z" />
                          </svg>
                              
                    </button>      
                </div>        
            </form>  
             @else  
            <form action="{{route('posts.likes.store', $post)}}" method="POST">
                @csrf
                <div class="my-4">
                    <button class="" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                  </svg>    
                    </button>      
                </div>        
            </form>  
            @endif      
            @endauth
            <p class="font-bold">
             {{ $post->likes->count()}}<span class="font-nomal"> likes</span>
            </p>
           </div>
         <div>
       <p class="font-bold font-sans">
           {{$post->user->username}}
       </p>
       <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
       <p class="mt-5 font-serif">{{$post->descripcion}}</p>
      </div>
      @auth
         @if ($post->user_id === auth()->user()->id) 
      <form action="{{route('posts.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer" value="Eliminar Publicacion">
      </form>
      @endif
      @endauth
        </div>
        
        <div class="md:w-1/2 p-5">
         <div class="shadow bg-white p-5 mb-5 rounded-lg">
            @auth
            <p class="text-xl font-bold text-center mb-4">
            Agrega un comentario
            </p>
            @if (session('mensaje'))
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                    {{session('mensaje')}}
                </div>
            @endif
            <form action="{{route('comentarios.store',['post'=> $post,'user'=> $user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="Comentario" class="mb:2 block uppercase text-gray-500 font-bold">
                        Comentario
                    </label>
                    <textarea class="border p-5 w-full rounded-xl" id="Comentario" name="comentario" placeholder="Escribir un comentario">{{ old('Comentario')}}</textarea>
                    @error('Comentario')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Comentar" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
            </form>
            @endauth
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
               @if ($post->comentario->count())
               @foreach ($post->comentario as $comentario)
               <div class="p-5 border-gray-300 border-b">
                <a href="{{ route('pots.index', auth()->user()->username)}}" class="font-bold font-serif">{{$comentario->user->username}}</a>
                  <p>{{$comentario->comentario}}</p> 
                  <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
               </div>
               @endforeach
                   @else
                  <p class="p-10 text-center">No hay comentario</p>
               @endif 
            </div>
         </div>
            
        </div>
    </div>
@endsection