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
    <x-navigation></x-navigation>
    <div class="lg:ml-64">
        <div class="mt-14">
            <div class="py-10 px-10">
                @yield('body')
            </div>
        </div>
    </div>
</body>

</html>