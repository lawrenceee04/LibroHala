<nav class="fixed top-0 z-50 w-full bg-sky-700 text-white border-slate-600">
    <div class="flex py-3">
        <a class="flex ms-2">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-slate-100 lg:hidden rounded-lg hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <i class="fa-solid fa-bars-staggered fa-xl px-1 py-2"></i>
            </button>
            <img src="{{@asset('favicon.ico')}}" class="h-8 ms-1" alt="" srcset="">
            <span class="self-center text-xl font-semibold ms-2">LibroHala</span>
        </a>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full lg:translate-x-0 bg-sky-700 text-white"
    aria-label="Sidebar">
    <nav class="flex flex-col justify-between h-full">
        <nav class="flex flex-col">
            <a href="/profile"
                class="flex items-center gap-4 p-6 {{ request()->is('profile') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">
                <img class="w-16 h-16 rounded-full"
                    src="https://gravatar.com/avatar/{{ hash('sha256', strtolower(trim(Auth::user()->email))) }}?d=retro&s=200"
                    alt="">
                <div>
                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                    <div class="font-light">Admin</div>
                </div>
            </a>
            <a href="/dashboard"
                class="px-6 py-3 {{ request()->is('dashboard') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">Dashboard</a>
            <button type="button"
                class="px-6 py-3 text-start flex flex-row items-center gap-4 cursor-not-allowed text-gray-300"
                aria-controls="dropdown-example" data-collapse-toggle="library-services" disabled>Library Services
                <i class="fa-solid fa-chevron-down" style="color: #d1d5db;"></i>
            </button>
            <ul id="library-services" class="{{ request()->is('libraryservices/*') ? '' : 'hidden'}}">
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-sky-500 hover:font-semibold">Issue</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-sky-500 hover:font-semibold">Renew</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group hover:bg-sky-500 hover:font-semibold">Return</a>
                </li>
            </ul>
            <a href="#" class="px-6 py-3 cursor-not-allowed text-gray-300">Fine
                Collection</a>
            <button type="button"
                class="px-6 py-3 hover:font-semibold hover:bg-sky-500 text-start flex flex-row items-center gap-4"
                aria-controls="dropdown-example" data-collapse-toggle="inventory-management">Inventory Management
                <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
            </button>
            <ul id="inventory-management" class="{{ request()->is('inventory/*') ? '' : 'hidden'}}">
                <li>
                    <a href="/inventory/books"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is('inventory/books') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">Books</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 transition duration-75 pl-11 group cursor-not-allowed text-gray-300">Journals</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 transition duration-75 pl-11 group cursor-not-allowed text-gray-300">Theses</a>
                </li>
            </ul>
            <button type="button"
                class="px-6 py-3 text-start flex flex-row items-center gap-4 cursor-not-allowed text-gray-300"
                aria-controls="dropdown-example" data-collapse-toggle="reports" disabled>Reporting
                <i class="fa-solid fa-chevron-down" style="color: #d1d5db;"></i>
            </button>
            <ul id="reports" class="hidden">
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is() ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }}">Utilization
                        Report</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is() ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }}">Patron
                        Report</a>
                </li>
            </ul>
            <button type="button"
                class="px-6 py-3 hover:font-semibold hover:bg-sky-500 text-start flex flex-row items-center gap-4"
                aria-controls="dropdown-example" data-collapse-toggle="cataloguing">Cataloguing
                <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
            </button>
            <ul id="cataloguing" class="{{ request()->is('cataloguing/*') ? '' : 'hidden'}}">
                <li>
                    <a href="{{ route('cataloguing.book') }}"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is('cataloguing/book') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">Book</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 transition duration-75 pl-11 group cursor-not-allowed text-gray-300">Journal</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 transition duration-75 pl-11 group cursor-not-allowed text-gray-300">Thesis</a>
                </li>
            </ul>
            <button type="button"
                class="px-6 py-3 text-start flex flex-row items-center gap-4 cursor-not-allowed text-gray-300"
                aria-controls="dropdown-example" data-collapse-toggle="staff-roles" disabled>Staff & Roles
                <i class="fa-solid fa-chevron-down" style="color: #d1d5db;"></i>
            </button>
            <ul id="staff-roles" class="hidden">
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is() ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }}">Staff
                        Management</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is() ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }}">Role
                        Management</a>
                </li>
            </ul>
            <a href="#" class="px-6 py-3 cursor-not-allowed text-gray-300">System Configuration</a>
            <a href="#" class="px-6 py-3 cursor-not-allowed text-gray-300">Override Records</a>
        </nav>

        <div>
            <form method="POST" action="{{ route('logout') }}" id="logout" class="hidden">
                @csrf
            </form>
            <button form="logout"
                class="w-full text-start px-6 py-3 font-semibold text-red-500 hover:text-white hover:font-bold hover:bg-red-500">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Log out
            </button>
            <div class="p-3 bg-sky-900">{{config('version.APP_VER')}}</div>
        </div>
    </nav>
</aside>

{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
    {{--
    <!-- Primary Navigation Menu -->--}}
    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
        {{-- <div class="flex justify-between h-16">--}}
            {{-- <div class="flex">--}}
                {{--
                <!-- Logo -->--}}
                {{-- <div class="shrink-0 flex items-center">--}}
                    {{-- <a href="{{ route('dashboard') }}">--}}
                        {{--
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />--}}
                        {{--
                    </a>--}}
                    {{-- </div>--}}

                {{--
                <!-- Navigation Links -->--}}
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
                        {{-- {{ __('Dashboard') }}--}}
                        {{-- </x-nav-link>--}}
                    {{-- </div>--}}
                {{--
            </div>--}}

            {{--
            <!-- Settings Dropdown -->--}}
            {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
                {{-- <x-dropdown align="right" width="48">--}}
                    {{-- <x-slot name="trigger">--}}
                        {{-- <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
                            {{-- <div>{{ Auth::user()->name }}</div>--}}

                            {{-- <div class="ms-1">--}}
                                {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">--}}
                                    {{--
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />--}}
                                    {{--
                                </svg>--}}
                                {{-- </div>--}}
                            {{-- </button>--}}
                        {{-- </x-slot>--}}

                    {{-- <x-slot name="content">--}}
                        {{-- <x-dropdown-link :href="route('profile.edit')">--}}
                            {{-- {{ __('Profile') }}--}}
                            {{-- </x-dropdown-link>--}}

                        {{--
                        <!-- Authentication -->--}}
                        {{-- <form method="POST" action="{{ route('logout') }}">--}}
                            {{-- @csrf--}}

                            {{-- <x-dropdown-link :href="route('logout')" --}} {{-- onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
                                {{-- {{ __('Log Out') }}--}}
                                {{-- </x-dropdown-link>--}}
                            {{-- </form>--}}
                        {{--
                    </x-slot>--}}
                    {{-- </x-dropdown>--}}
                {{-- </div>--}}

            {{--
            <!-- Hamburger -->--}}
            {{-- <div class="-me-2 flex items-center sm:hidden">--}}
                {{-- <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
                    {{-- <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
                        {{--
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />--}}
                        {{--
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
                        {{--
                    </svg>--}}
                    {{-- </button>--}}
                {{-- </div>--}}
            {{--
        </div>--}}
        {{-- </div>--}}

    {{--
    <!-- Responsive Navigation Menu -->--}}
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
        {{-- <div class="pt-2 pb-3 space-y-1">--}}
            {{-- <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
                {{-- {{ __('Dashboard') }}--}}
                {{-- </x-responsive-nav-link>--}}
            {{-- </div>--}}

        {{--
        <!-- Responsive Settings Options -->--}}
        {{-- <div class="pt-4 pb-1 border-t border-gray-200">--}}
            {{-- <div class="px-4">--}}
                {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
                {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
                {{-- </div>--}}

            {{-- <div class="mt-3 space-y-1">--}}
                {{-- <x-responsive-nav-link :href="route('profile.edit')">--}}
                    {{-- {{ __('Profile') }}--}}
                    {{-- </x-responsive-nav-link>--}}

                {{--
                <!-- Authentication -->--}}
                {{-- <form method="POST" action="{{ route('logout') }}">--}}
                    {{-- @csrf--}}

                    {{-- <x-responsive-nav-link :href="route('logout')" --}} {{-- onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
                        {{-- {{ __('Log Out') }}--}}
                        {{-- </x-responsive-nav-link>--}}
                    {{-- </form>--}}
                {{--
            </div>--}}
            {{-- </div>--}}
        {{--
    </div>--}}
    {{--
</nav>--}}