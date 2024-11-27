@extends('layouts.base')

@section('body')
    <x-navigation></x-navigation>
    <div class="lg:ml-64">
        <div class="mt-14">
            <div class="py-10 px-10">
                <div class="mb-4 text-xl font-bold">All Books</div>


                <div class="grid grid-cols-2 mb-3 justify-stretch">
                    <form class="container self-start">
                        <label for="default-search"
                               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                   class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search Books" required />
                            <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                    <div class="flex items-center justify-end">
                        <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                            new book</button>
                    </div>
                </div>

                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                       class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Accession Number
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Title
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Edition
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Author
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Publisher
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            ISBN
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Class
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Topic Area
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Cutter Number
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Publication Year
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Copies
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Status
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Genre
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Description
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Edit
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    @foreach($books as $book)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox"
                                           class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-194556" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td
                                class="p-4 text-sm font-normal text-gray-500 overflow-hidden max-w-md dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"> {{$book->accession_number}}
                                </div>
                            </td>
                            <td
                                class="p-4 text-sm font-normal text-gray-500 overflow-hidden max-w-md dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white"> {{$book->title}} </div>
                            </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->edition}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->author}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->publisher}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->isbn}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase"> {{$book->class}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->topic_area}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase"> {{$book->cutter_number}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->publication_year}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->copies}} </td>
                            <td
                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap {{ $book->status == 'Available' ? 'bg-green-500': 'bg-red-500' }}  text-white text-center"> {{$book->status}} </td>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$book->genre}} </td>
                            <td
                                class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400"> {{$book->description}} </td>

                            <td class="p-4 space-x-2 whitespace-nowrap">


                                <!-- Modal toggle -->
                                <button type="button" id="updateProductButton" data-modal-target="updateBook"
                                        data-modal-toggle="updateBook" data-drawer-target="drawer-update-product-default"
                                        data-drawer-show="drawer-update-product-default"
                                        aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    Update
                                </button>

                                <!-- Main modal -->
                                <div id="updateBook" tabindex="-1" aria-hidden="true"
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
                                                        data-modal-toggle="updateBook">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="w-full p-4 md:p-5">
                                                <div class="grid gap-4 mb-4 grid-cols-4">
                                                    <div class="col-span-4">
                                                        <label for="name"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                                        <input type="text" name="name" id="title"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="How to Think Like a Programmer">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edition</label>
                                                        <input type="text" name="price" id="isbn"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="2nd Ed.">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                                                        <input type="text" name="price" id="author"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="Paul Vickers">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                                                        <input type="text" name="price" id="isbn"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="978-1-84480-900-4">
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                                        <input type="text" name="price" id="class-number"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="QA">
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic
                                                            Area</label>
                                                        <input type="text" name="price" id="topic-area"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="76.6">
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cutter
                                                            Number</label>
                                                        <input type="text" name="price" id="cutter-number"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="V64">
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication
                                                            Year</label>
                                                        <input type="text" name="price" id="publication-year"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="2008">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copies</label>
                                                        <input type="text" name="price" id="copies"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="C-1">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                                                        <input type="text" name="price" id="genre"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="Computer Science">
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                        <textarea id="description" rows="4"
                                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                  placeholder="Write product description here"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                        class="text-white items-center w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Save
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="deleteProductButton" data-modal-target="deleteBook"
                                        data-modal-toggle="deleteBook" data-drawer-target="drawer-delete-product-default"
                                        data-drawer-show="drawer-delete-product-default"
                                        aria-controls="drawer-delete-product-default" data-drawer-placement="right"
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
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Are you sure you want to delete this book?</h3>
                                                <button data-modal-hide="deleteBook" type="button"
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
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
