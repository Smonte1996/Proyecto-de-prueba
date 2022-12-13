
@extends('layouts.app')

@section('titulos')
Pagina Principal
@endsection


@section('contenido')
@auth
@if ($posts->count())
<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post )
        <div>
            <a href="{{ route('posts.show', ['post'=> $post,'user'=> $post->user]) }}" >
                <img src="{{ asset('uploads').'/'. $post->imagen }}" alt="Imgen de la Publicacion" {{ $post->tirulo }}>
            </a>
        </div>       
    @endforeach
    <div class="my-10">
        {{$posts->links()}}
    </div>
    @else
    <p>No hay Posts</p>
@endif
@endauth
@endsection