@extends('layouts.base-sidebar')

@section('body')
<div class="mb-4 text-xl font-bold">All Authors</div>

<div class="grid grid-cols-2 mb-3 gap-4 justify-stretch items-center">
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
                <input type="hidden" name="sort_order" id="sort_order" value="asc">
            </form>

            <input name="keyword" type="text" id="keyword" form="sort"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search author" value="{{ request()->input('keyword') }}" />
            <button type="submit" form="sort"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('cataloguing.book') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
            new author</a>
    </div>
</div>

<table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
    <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
            <x-book-table-column>
                First Name
            </x-book-table-column>
            <x-book-table-column>
                Middle Name
            </x-book-table-column>
            <x-book-table-column>
                Last Name
            </x-book-table-column>
            <x-book-table-column>
                Suffix
            </x-book-table-column>
            <x-book-table-column>
                Cutter Number
            </x-book-table-column>
        </tr>

    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

        @foreach($authors as $author)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$author->first_name}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$author->middle_name}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$author->last_name}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$author->suffix}} </td>
            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$author->cutter_number}} </td>

            <!-- Modal toggle -->
            <button type="button" id="updateProductButton" data-modal-target="updateAuthor{{$author->id}}"
                data-modal-toggle="updateAuthor{{$author->id}}" aria-controls="drawer-update-product-default"
                data-drawer-placement="right"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"></path>
                </svg>
                Update
            </button>

            <!-- Main modal -->
            <div id="updateAuthor{{$author->id}}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Update Author information
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="updateAuthor{{$author->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="POST" action="{{ route('author.update') }}" class="w-full p-4 md:p-5">
                            @csrf
                            @method('PATCH')

                            <div class="grid gap-4 mb-4 grid-cols-4">
                                <div class="col-span-4">
                                    <label for="accession_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accession
                                        Number</label>
                                    <input type="text" name="accession_number" id="accession_number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{$author->first_name}}">
                                </div>
                                <div class="col-span-4">
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{$author->middle_name}}">
                                </div>
                                <div class="col-span-4">
                                    <label for="edition"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edition</label>
                                    <input type="text" name="edition" id="edition"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{$author->last_name}}">
                                </div>
                                <div class="col-span-4">
                                    <label for="author"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                                    <input type="text" name="author" id="author"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{$author->suffix}}">
                                </div>
                                <div class="col-span-4">
                                    <label for="publisher"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                                    <input type="text" name="publisher" id="publisher"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{$author->cutter_number}}">
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

            <button type="button" id="deleteProductButton" data-modal-target="deleteAuthor"
                data-modal-toggle="deleteAuthor" aria-controls="drawer-delete-product-default"
                data-drawer-placement="right"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Delete
            </button>

            <div id="deleteAuthor" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="deleteAuthor">
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
                                Are you sure you want to remove this author?</h3>
                            <form method="POST" action="/inventory/books/{{$author->id}}"
                                id="deleteAuthor{{$author->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button form="deleteAuthor{{$author->id}}" data-modal-hide="deleteAuthor" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, remove this author
                            </button>
                            <button data-modal-hide="deleteAuthor" type="button"
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
@endsection