<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LibroHala</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="fixed flex justify-between items-center w-full bg-sky-700 text-white border-slate-600 p-3">
        <div class="flex">
            <a href="#" class="flex">
                <img src="{{@asset('favicon.ico')}}" class="h-8 ms-1" alt="" srcset="">
                <span class="ms-2 self-center text-xl font-semibold">LibroHala</span>
            </a>
        </div>

        <div class="flex">
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md"
                href="{{ route('kiosk.checkinout.index') }}">Kiosk</a>
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md"
                href="{{ route('login') }}">Login</a>
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md"
                href="{{ route('register') }}">Register</a>
        </div>
    </nav>
    @yield('body')

</body>

</html>