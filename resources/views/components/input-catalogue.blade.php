<div class="{{ $size }} col-span-4">
    <label for="{{ $slot }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accession
        Number</label>
    <input type="text" name="{{ $slot }}" id="{{ $slot }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        value="{{old('{{$slot}}', $ {{$slot}} ?? '')}}">

    {{-- Alerts --}}
    @if ($errors->addBook->first('{{ $slot }}'))
    <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium"> {{$errors->addBook->first('{{ $slot }}')}}
            </span> Double check the
            accession
            number and
            try again.
        </div>
    </div>
    @endif
</div>