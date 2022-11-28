<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getlocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevstAgRaM - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
</head>
<body class="bg-gray-100">
    
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">DevStraGram</h1>
         <nav class="flex gap-2 items-center">
            <a href="#" class="font-bold uppercase text-gray-600 text-sms">Login</a> |
            <a href="{{route('Registers')}}" class="font-bold uppercase text-gray-600 text-sms">Crear cuenta</a>
         </nav>
         </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulos')
        </h2>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold">
     DevStraGram - Todo los derechos resrvado &copy; {{now()->year}}
    </footer>
</body>
</html>