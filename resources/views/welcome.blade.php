@extends('layouts.base')

@section('body')
<div class="w-full h-full">
    <nav class="fixed flex justify-between items-center w-full bg-sky-700 text-white border-slate-600 p-3">
        <div class="flex">
            <a href="#" class="flex">
                <img src="{{@asset('favicon.ico')}}" class="h-8 ms-1" alt="" srcset="">
                <span class="ms-2 self-center text-xl font-semibold">LibroHala</span>
            </a>
        </div>

        <div class="flex">
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md" href="#">Kiosk</a>
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md"
                href="{{ view('auth.login') }}">Login</a>
            <a class="hover:bg-sky-900 text-neutral-50 text-sm px-2 py-3 rounded-md"
                href="{{ view('auth.register') }}">Register</a>
        </div>
    </nav>

    <div class="h-dvh flex flex-row items-center justify-around bg-cover
            bg-gradient-to-tr from-sky-600 to-violet-400">
    </div>
</div>
@endsection