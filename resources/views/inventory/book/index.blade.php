@extends('layouts.base-sidebar')

@section('body')

<div class="mb-4 text-xl font-bold">All Books</div>

<div class="grid grid-cols-3 mb-3 gap-4 justify-stretch items-center">
    <div class="container self-start">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <form action="{{ route('books.search') }}" method="GET" class="hidden" id="sort">
                @csrf
                {{-- <input type="hidden" name="query" value="{{ request()->input('query') }}"> --}}
                <input type="hidden" name="sort_order" id="sort_order" value="asc">
            </form>

            <input name="keyword" type="text" id="keyword" form="sort"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search books" value="{{ request()->input('keyword') }}" />
            <button type="submit" form="sort"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </div>

    <div class="container">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center"
            type="button">Sort<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56">
            <ul class="text-sm text-gray-700 p-4" aria-labelledby="dropdownDefaultButton">
                <li>
                    <div class="flex items-center p-2">
                        <input id="no_sort" type="radio" value="" name="sort_by" form="sort"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ request()->input('sort_by') == "" ? 'checked' : '' }}>
                        <label for="no_sort" class="ms-2 text-sm text-gray-900 dark:text-gray-300">No
                            sort</label>
                    </div>
                </li>
                <x-sort-by sortBy="Accession Number">
                    Accession Number
                </x-sort-by>
                <x-sort-by sortBy="Title">
                    Title
                </x-sort-by>
                <x-sort-by sortBy="Edition">
                    Edition
                </x-sort-by>
                <x-sort-by sortBy="Author">
                    Author
                </x-sort-by>
                <x-sort-by sortBy="Publisher">
                    Publisher
                </x-sort-by>
                <x-sort-by sortBy="ISBN">
                    ISBN
                </x-sort-by>
                <x-sort-by sortBy="Class">
                    Class
                </x-sort-by>
                <x-sort-by sortBy="Topic Area">
                    Topic Area
                </x-sort-by>
                <x-sort-by sortBy="Cutter Number">
                    Cutter Number
                </x-sort-by>
                <x-sort-by sortBy="Publication Year">
                    Publication Year
                </x-sort-by>
                <x-sort-by sortBy="Copies">
                    Copies
                </x-sort-by>
                <x-sort-by sortBy="Genre">
                    Genre
                </x-sort-by>
                <x-sort-by sortBy="Description">
                    Description
                </x-sort-by>
            </ul>
        </div>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('book.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
            book</a>
    </div>
</div>

<table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
    <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
            <x-book-table-column>
                Accession Number
            </x-book-table-column>
            <x-book-table-column>
                Title
            </x-book-table-column>
            <x-book-table-column>
                Edition
            </x-book-table-column>
            <x-book-table-column>
                Author
            </x-book-table-column>
            <x-book-table-column>
                Publisher
            </x-book-table-column>
            <x-book-table-column>
                ISBN
            </x-book-table-column>
            <x-book-table-column>
                Class
            </x-book-table-column>
            <x-book-table-column>
                Topic Area
            </x-book-table-column>
            <x-book-table-column>
                Cutter Number
            </x-book-table-column>
            <x-book-table-column>
                Publication Year
            </x-book-table-column>
            <x-book-table-column>
                Copies
            </x-book-table-column>
            <x-book-table-column>
                Status
            </x-book-table-column>
            <x-book-table-column>
                Genre
            </x-book-table-column>
            <x-book-table-column>
                Description
            </x-book-table-column>
            <x-book-table-column>
                Edit
            </x-book-table-column>
        </tr>

    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

        @foreach($books as $book)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="p-4 text-sm font-normal text-gray-500 overflow-hidden max-w-md dark:text-gray-400">
                <div class="text-base font-semibold text-gray-900 dark:text-white">
                    {{$book->accession_number}}
                </div>
            </td>
            <td class="p-4 text-sm font-normal text-gray-500 overflow-hidden max-w-md dark:text-gray-400">
                <div class="text-base font-semibold text-gray-900 dark:text-white"> {{$book->title}}
                </div>
            </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->edition}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->author}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->publisher}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->isbn}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">
                {{$book->class}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->topic_area}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">
                {{$book->cutter_number}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->publication_year}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->copies}} </td>
            <td
                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap {{ $book->status == 'Available' ? 'bg-green-500': 'bg-red-500' }}  text-white text-center">
                {{$book->status}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$book->genre}} </td>
            <td
                class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                {{$book->description}} </td>

            <td class="p-4 space-x-2 whitespace-nowrap">


                <!-- Modal toggle -->
                <button type="button" id="updateProductButton" data-modal-target="updateBook{{$book->id}}"
                    data-modal-toggle="updateBook{{$book->id}}" aria-controls="drawer-update-product-default"
                    data-drawer-placement="right"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Update
                </button>

                <!-- Main modal -->
                <div id="updateBook{{$book->id}}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Update book information
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="updateBook{{$book->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form method="POST" action="/inventory/book/{{$book->id}}" class="w-full p-4 md:p-5">
                                @csrf
                                @method('PATCH')

                                <div class="grid gap-4 mb-4 grid-cols-4">
                                    <div class="col-span-4">
                                        <label for="accession_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accession
                                            Number</label>
                                        <input type="text" name="accession_number" id="accession_number"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->accession_number}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="title"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->title}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="edition"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edition</label>
                                        <input type="text" name="edition" id="edition"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->edition}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="author"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                                        <input type="text" name="author" id="author"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->author}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="publisher"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                                        <input type="text" name="publisher" id="publisher"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->publisher}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="isbn"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                                        <input type="text" name="isbn" id="isbn"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->isbn}}">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="class"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                        <input type="text" name="class" id="class"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->class}}">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="topic_area"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic
                                            Area</label>
                                        <input type="text" name="topic_area" id="topic_area"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->topic_area}}">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="cutter_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cutter
                                            Number</label>
                                        <input type="text" name="cutter_number" id="cutter_number"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->cutter_number}}">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="publication_year"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication
                                            Year</label>
                                        <input type="text" name="publication_year" id="publication_year"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->publication_year}}">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="copies"
                                            class="block mb-2 text-sm font-medium te xt-gray-900 dark:text-white">Copies</label>
                                        <input type="text" name="copies" id="copies"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->copies}}">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="genre"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                                        <input type="text" name="genre" id="genre"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="{{$book->genre}}">
                                    </div>
                                    <div class="col-span-4">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea type="text" name="description" id="description" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$book->description}}</textarea>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white items-center w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" id="deleteProductButton" data-modal-target="deleteBook"
                    data-modal-toggle="deleteBook" aria-controls="drawer-delete-product-default"
                    data-drawer-placement="right"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Delete
                </button>

                <div id="deleteBook" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="deleteBook">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                    Are you sure you want to delete this book?</h3>
                                <form method="POST" action="/inventory/books/{{$book->id}}"
                                    id="deleteBook{{$book->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button form="deleteBook{{$book->id}}" data-modal-hide="deleteBook" type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, delete this book
                                </button>
                                <button data-modal-hide="deleteBook" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<div>
    {{ $books->appends(['sort_by' => $sortBy, 'sort_order' => $sortOrder,])->links() }}
</div>

@endsection