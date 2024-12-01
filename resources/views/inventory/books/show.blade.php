@extends('layouts.base')

@section('body')
<x-navigation></x-navigation>
<div class="lg:ml-64">
    <div class="mt-14">
        <div class="py-10 px-10">
            <div class="mb-4 text-xl font-bold">Book</div>

            <form method="POST" action="/inventory/books/{{$book->id}}" class="w-full p-4 md:p-5">
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
@endsection
