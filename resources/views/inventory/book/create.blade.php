@extends('layouts.base-sidebar')

@section('body')
<div class="mb-4 text-xl font-bold">Add book</div>

<form method="POST" action="{{route('book.store')}}" class="w-full p-4 md:p-5">
       @csrf

       <div class="grid gap-4 mb-4 grid-cols-4">

              <div class="col-span-4">
                     <label for="accession_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accession
                            Number</label>
                     <input type="text" name="accession_number" id="accession_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('accession_number', $accession_number ?? '') }}">

                     @if ($errors->addBook->first('accession_number'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('accession_number')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                     <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('title', $title ?? '') }}">

                     @if ($errors->addBook->first('title'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('title')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <label for="edition"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edition</label>
                     <input type="text" name="edition" id="edition"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('edition', $edition ?? '' ) }}">

                     @if ($errors->addBook->first('edition'))
                     <div class=" flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800
                            dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('edition')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <div class="w-full"
                            x-data="alpineMultiSelect({selected: {{ json_encode(old('authors', $authors->pluck('id')->map(fn($id) => (string)$id)->toArray())) }}, elementId:'authors'})">

                            <label for="authors"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                            <select name="authors[]" id="authors"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden"
                                   multiple>
                                   @foreach($authors as $author)
                                   <option value="{{ $author->id }}"
                                          data-search="{{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name }}"
                                          @if(in_array($author->id, old('authors', $authors->pluck('id')->toArray())))
                                          selected @endif>
                                          {{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name
                                          }}
                                   </option>
                                   @endforeach
                            </select>

                            <div class="w-full flex flex-col items-center mx-auto" @keyup.alt="toggle">
                                   <!-- Selected Authors -->
                                   <input class="hidden" x-bind:value="selectedValues()">

                                   <div class="inline-block relative w-full">
                                          <div class="flex flex-col items-center relative">

                                                 <!-- Selected elements container -->
                                                 <div class="w-full">
                                                        <div>
                                                               <div class="my-2 p-1 flex border border-gray-200 bg-white
                                                               rounded-md">
                                                                      <div class="flex flex-auto flex-wrap"
                                                                             x-on:click="open">
                                                                             <!-- iterating over selected elements -->
                                                                             <template
                                                                                    x-for="(option,index) in selectedElms"
                                                                                    :key="option.value">
                                                                                    <div x-show="index < 2"
                                                                                           class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-indigo-700 bg-indigo-100 border border-indigo-300 ">
                                                                                           <div class="text-xs font-normal leading-none max-w-full flex-initial"
                                                                                                  x-model="selectedElms[option]"
                                                                                                  x-text="option.text">
                                                                                           </div>
                                                                                           <div
                                                                                                  class="flex flex-auto flex-row-reverse">
                                                                                                  <div
                                                                                                         x-on:click.stop="remove(index,option)">
                                                                                                         <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                class="h-6 w-6 ml-2"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2">
                                                                                                                <path stroke-linecap="round"
                                                                                                                       stroke-linejoin="round"
                                                                                                                       d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                                                         </svg>
                                                                                                  </div>
                                                                                           </div>
                                                                                    </div>
                                                                             </template>
                                                                             <!-- More than two items selected -->
                                                                             <div x-show="selectedElms.length > 2"
                                                                                    class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-indigo-700 bg-indigo-100 border border-indigo-300 ">
                                                                                    <div
                                                                                           class="text-xs font-normal h-6 flex justify-center items-center leading-none max-w-full flex-initial">
                                                                                           <span
                                                                                                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-indigo-200 text-pink-800 mr-2">
                                                                                                  <span
                                                                                                         x-text="selectedElms.length -2"></span>
                                                                                           </span>
                                                                                           more selected
                                                                                    </div>
                                                                             </div>
                                                                             <!-- None items selected -->
                                                                             <div x-show="selectedElms.length == 0"
                                                                                    class="flex-1">
                                                                                    <input placeholder="Select authors"
                                                                                           class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                                                                           x-bind:value="selectedElements()"
                                                                                           hidden>
                                                                             </div>
                                                                      </div>
                                                                      <!-- Drop down toogle with icons-->
                                                                      <div
                                                                             class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                                             <button type="button" x-show="!isOpen()"
                                                                                    x-on:click="open()"
                                                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                           class="h-4 w-4" fill="none"
                                                                                           viewBox="0 0 24 24"
                                                                                           stroke="currentColor"
                                                                                           stroke-width="2">
                                                                                           <path stroke-linecap="round"
                                                                                                  stroke-linejoin="round"
                                                                                                  d="M19 9l-7 7-7-7" />
                                                                                    </svg>
                                                                             </button>
                                                                             <button type="button" x-show="isOpen()"
                                                                                    x-on:click="close()"
                                                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                           class="h-4 w-4" fill="none"
                                                                                           viewBox="0 0 24 24"
                                                                                           stroke="currentColor"
                                                                                           stroke-width="2">
                                                                                           <path stroke-linecap="round"
                                                                                                  stroke-linejoin="round"
                                                                                                  d="M5 15l7-7 7 7" />
                                                                                    </svg>
                                                                             </button>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                        <!-- Dropdown container -->
                                                        <div class="w-full">
                                                               <div x-show.transition.origin.top="isOpen()"
                                                                      x-trap="isOpen()"
                                                                      class="absolute shadow-lg top-100 bg-white z-40 w-full lef-0 rounded max-h-80"
                                                                      x-on:click.away="close">
                                                                      <div class="flex flex-col w-full">

                                                                             <div class="px-2 py-4 border-b-2">
                                                                                    <!-- Search input-->
                                                                                    <div
                                                                                           class="mt-1 relative rounded-md shadow-sm">
                                                                                           <div
                                                                                                  class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                         class="h-5 w-5 text-gray-400"
                                                                                                         fill="none"
                                                                                                         viewBox="0 0 24 24"
                                                                                                         stroke="currentColor"
                                                                                                         stroke-width="2">
                                                                                                         <path stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                                                                  </svg>
                                                                                           </div>
                                                                                           <input type="text"
                                                                                                  name="search"
                                                                                                  autocomplete="off"
                                                                                                  id="search"
                                                                                                  x-model.debounce.750ms="search"
                                                                                                  class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border border-indigo-300 rounded-md h-10"
                                                                                                  placeholder=""
                                                                                                  @keyup.escape="clear"
                                                                                                  @keyup.delete="deselect">
                                                                                           <div
                                                                                                  class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                                                                                  <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400 mr-2"
                                                                                                         x-on:click="clear">
                                                                                                         Esc
                                                                                                  </kbd>
                                                                                                  <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400"
                                                                                                         x-on:click="deselect">
                                                                                                         Del
                                                                                                  </kbd>
                                                                                           </div>
                                                                                    </div>
                                                                             </div>
                                                                             <!-- Options container -->
                                                                             <ul class="z-10 mt-0 w-full bg-white shadow-lg max-h-80 rounded-md py-0 text-base ring-1 ring-black ring-opacity-5 focus:outline-none  overflow-y-auto sm:text-sm"
                                                                                    tabindex="-1" role="listbox"
                                                                                    @keyup.delete="deselect">
                                                                                    <template
                                                                                           x-for="(option,index) in options"
                                                                                           :key="option.text">
                                                                                           <li class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-3"
                                                                                                  role="option">
                                                                                                  <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-slate-100"
                                                                                                         x-bind:class="option.selected ? 'bg-indigo-100' : ''"
                                                                                                         @click="select(index,$event)">
                                                                                                         <div x-bind:class="option.selected ? 'border-indigo-600' : ''"
                                                                                                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                                                                                <div
                                                                                                                       class="w-full items-center flex">
                                                                                                                       <div class="mx-2 leading-6"
                                                                                                                              x-model="option"
                                                                                                                              x-text="option.text">
                                                                                                                       </div>
                                                                                                                       <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                                                                                                              x-show="option.selected">

                                                                                                                              <svg class="h-5 w-5"
                                                                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                                                                     viewBox="0 0 20 20"
                                                                                                                                     fill="currentColor"
                                                                                                                                     aria-hidden="true">
                                                                                                                                     <path fill-rule="evenodd"
                                                                                                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                                                                                            clip-rule="evenodd" />
                                                                                                                              </svg>
                                                                                                                       </span>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </div>
                                                                                           </li>
                                                                                    </template>
                                                                             </ul>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                 </div>

                                          </div>
                                   </div>

                                   <script>
                                          document.addEventListener("alpine:init", () => {
                                       Alpine.data("alpineMultiSelect", (obj) => ({
                                           elementId: obj.elementId,
                                           options: [],
                                           selected: obj.selected,
                                           selectedElms: [],
                                           show: false,
                                           search: '',
                                           open() {
                                               this.show = true
                                           },
                                           close() {
                                               this.show = false
                                           },
                                           toggle() {
                                               this.show = !this.show
                                           },
                                           isOpen() {
                                               return this.show === true
                                           },

                                           // Initializing component
                                           init() {
                                               const options = document.getElementById(this.elementId).options;
                                               for (let i = 0; i < options.length; i++) {

                                                   this.options.push({
                                                       value: options[i].value,
                                                       text: options[i].innerText,
                                                       search: options[i].dataset.search,
                                                       selected: Object.values(this.selected).includes(options[i].value)
                                                   });

                                                   if (this.options[i].selected) {
                                                       this.selectedElms.push(this.options[i])
                                                   }
                                               }


                                               // searching for the given value
                                               this.$watch("search", (e => {
                                                   this.options = []
                                                   const options = document.getElementById(this.elementId).options;
                                                   Object.values(options).filter((el) => {
                                                       var reg = new RegExp(this.search, 'gi');
                                                       return el.dataset.search.match(reg)
                                                   }).forEach((el) => {
                                                       let newel = {
                                                           value: el.value,
                                                           text: el.innerText,
                                                           search: el.dataset.search,
                                                           selected: Object.values(this.selected).includes(el.value)
                                                       }
                                                       this.options.push(newel);

                                                   })


                                               }));
                                           },
                                           // clear search field
                                           clear() {
                                               this.search = ''
                                           },
                                           // deselect selected options
                                           deselect() {
                                               setTimeout(() => {
                                                   this.selected = []
                                                   this.selectedElms = []
                                                   Object.keys(this.options).forEach((key) => {
                                                       this.options[key].selected = false;
                                                   })
                                               }, 100)
                                           },
                                           // select given option
                                           select(index, event) {
                                               if (!this.options[index].selected) {
                                                   this.options[index].selected = true;
                                                   this.options[index].element = event.target;
                                                   this.selected.push(this.options[index].value);
                                                   this.selectedElms.push(this.options[index]);

                                               } else {
                                                   this.selected.splice(this.selected.lastIndexOf(index), 1);
                                                   this.options[index].selected = false
                                                   Object.keys(this.selectedElms).forEach((key) => {
                                                       if (this.selectedElms[key].value == this.options[index].value) {
                                                           setTimeout(() => {
                                                               this.selectedElms.splice(key, 1)
                                                           }, 100)
                                                       }
                                                   })
                                               }
                                           },
                                           // remove from selected option
                                           remove(index, option) {
                                               this.selectedElms.splice(index, 1);
                                               Object.keys(this.selected).forEach((skey) => {
                                                       if (this.selected[skey] == option.value) {
                                                           this.selected.splice(skey, 1);
                                                       }
                                                   });
                                               Object.keys(this.options).forEach((key) => {
                                                   if (this.options[key].value == option.value) {
                                                       this.options[key].selected = false;
                                                   }
                                               });
                                           },
                                           // filter out selected elements
                                           selectedElements() {
                                               return this.options.filter(op => op.selected === true)
                                           },
                                           // get selected values
                                           selectedValues() {
                                               return this.options.filter(op => op.selected === true).map(el => el.value)
                                           }
                                       }));
                                   });
                                   </script>
                            </div>
                     </div>

                     @if ($errors->addBook->first('author'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('author')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <label for="publisher"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                     <input type="text" name="publisher" id="publisher"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('publisher', $publisher ?? '') }}">

                     @if ($errors->addBook->first('publisher'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('publisher')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                     <input type="text" name="isbn" id="isbn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('isbn', $isbm ?? '') }}">

                     @if ($errors->addBook->first('isbn'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('isbn')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-1">
                     <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                     <input type="text" name="class" id="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('class', $class ?? '') }}">
                     @if ($errors->addBook->first('class'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('class')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-1">
                     <label for="topic_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic
                            Area</label>
                     <input type="text" name="topic_area" id="topic_area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('topic_area', $topic_area ?? '') }}">
                     @if ($errors->addBook->first('topic_area'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('topic_area')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-1">
                     <label for="cutter_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cutter
                            Number</label>
                     <input type="text" name="cutter_number" id="cutter_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('cutter_number', $cutter_number ?? '') }}">
                     @if ($errors->addBook->first('cutter_number'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('cutter_number')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-1">
                     <label for="publication_year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication
                            Year</label>
                     <input type="text" name="publication_year" id="publication_year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('publication_year', $publication_year ?? '') }}">
                     @if ($errors->addBook->first('publication_year'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium">
                                          {{$errors->addBook->first('publication_year')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-2">
                     <label for="copies"
                            class="block mb-2 text-sm font-medium te xt-gray-900 dark:text-white">Copies</label>
                     <input type="text" name="copies" id="copies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('copies', $copies ?? '') }}">
                     @if ($errors->addBook->first('copies'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('copies')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-2">
                     <label for="genre"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                     <input type="text" name="genre" id="genre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ old('genre', $genre ?? '') }}">
                     @if ($errors->addBook->first('genre'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('genre')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>

              <div class="col-span-4">
                     <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                     <textarea type="text" name="description" id="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description', $description ?? '') }}</textarea>
                     @if ($errors->addBook->first('description'))
                     <div class="flex items-center p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                   <path
                                          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                   <span class="font-medium"> {{$errors->addBook->first('description')}}
                                   </span>
                            </div>
                     </div>
                     @endif
              </div>
       </div>

       <button type="submit"
              class="text-white items-center w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Save
       </button>

</form>

@endsection