@extends('layouts.base')

@section('body')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sky-100">
    <div>
        <img src="{{@asset('favicon.ico')}}" alt="" srcset="" class="h-32">
    </div>
    <div
        class="w-full sm:max-w-lg mt-6 px-10 py-10 bg-sky-100 shadow-md border-4 border-green-700 overflow-hidden sm:rounded-lg text-center">
        <p class="font-bold text-2xl text-center pb-8">Check In & Check Out</p>

        @if (session('isSuccess'))
        <div id="success-alert"
            class="items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 transition-opacity duration-1000"
            role="alert">
            <div>
                <span class="font-medium text-xl text-center">Welcome to the Library!</span>
                <p class="font-bold text-2xl">{{ session('isSuccess')['first_name'] . '
                    ' . session('isSuccess')['last_name']}}</p>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-alert').classList.add('opacity-0');
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 500); // 500 milliseconds = 0.5 seconds
                }, 1500); // 5000 milliseconds = 5 seconds
            </script>
        </div>

        @endif

        @if ($errors->checkinout->first('patron_id'))
        <div id='error'
            class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 transition-opacity duration-1000"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"> {{$errors->checkinout->first('patron_id')}}
                </span>
            </div>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('error').classList.add('opacity-0');
                setTimeout(function() {
                    document.getElementById('error').style.display = 'none';
                }, 500); // 500 milliseconds = 0.5 seconds
            }, 1500); // 5000 milliseconds = 5 seconds
        </script>
        @endif

        <form action="{{ route('kiosk.checkinout.store') }}" method="post">
            @csrf
            <input type="text" name="patron_id" id="patron_id"
                class="bg-white-50 border border-gray-300 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Type your ID number" />
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm w-full sm:w-auto px-5 py-3 text-center mt-6">Submit</button>
        </form>
    </div>
</div>
@endsection