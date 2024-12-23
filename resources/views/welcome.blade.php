@extends('layouts.base')

@section('body')
<div class="w-full h-full">
    <div class="h-dvh flex flex-row items-center justify-around bg-cover
            bg-gradient-to-tr from-sky-600 to-violet-400">
        <div class="flex flex-col lg:flex-row items-center justify-center w-full">
            <div class="flex flex-col items-start justify-center h-64 w-full lg:h-dvh ml-10">
                <p class="text-5xl font-normal text-stone-200/100">Your All-in-One</p>
                <p class="text-5xl font-bold text-stone-200/100">Library Command Center</p>
            </div>
            <div class="flex flex-col items-center justify-center h-96 w-full lg:h-dvh bg-cover bg-center"
                style="background-image: url('{{ asset('pexels-yasemin-gul-1189389426-28585941.jpg') }}');">
            </div>
        </div>
    </div>
</div>
@endsection