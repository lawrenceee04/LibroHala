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
                <div class="pr-5 overflow-hidden">
                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                    <div class="font-light">Admin</div>
                </div>
            </a>
            <a href="/dashboard"
                class="px-6 py-3 {{ request()->is('dashboard') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">Dashboard</a>
            <button type="button"
                class="px-6 py-3 text-start flex flex-row items-center gap-4 cursor-not-allowed text-gray-300"
                aria-controls="dropdown-example"
                x-data="{ open: {{ request()->is('libraryservices/*') ? 'true' : 'false' }} }" @click="open = !open"
                data-collapse-toggle="library-services" disabled>Library Services
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid" style="color: #d1d5db;"></i>
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
                aria-controls="dropdown-example"
                x-data="{ open: {{ request()->is('inventory/*') ? 'true' : 'false' }} }" @click="open = !open"
                data-collapse-toggle="inventory-management">Inventory Management
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid" style="color: #ffffff;"></i>
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
                aria-controls="dropdown-example"
                x-data="{ open: {{ request()->is('reporting/*') ? 'true' : 'false' }} }" @click="open = !open"
                data-collapse-toggle="reports" disabled>Reporting
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid" style="color: #d1d5db;"></i>
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
                aria-controls="dropdown-example"
                x-data="{ open: {{ request()->is('cataloguing/*') ? 'true' : 'false' }} }" @click="open = !open"
                data-collapse-toggle="cataloguing">Cataloguing
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid" style="color: #ffffff;"></i>
            </button>
            <ul id="cataloguing" class="{{ request()->is('cataloguing/*') ? '' : 'hidden'}}">
                <li>
                    <a href="{{ route('cataloguing.book.create') }}"
                        class="flex items-center w-full p-2 text-white transition duration-75 pl-11 group {{ request()->is('cataloguing/book/create') ? 'font-semibold bg-sky-500' : 'hover:font-semibold hover:bg-sky-500' }} ">Book</a>
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
                aria-controls="dropdown-example"
                x-data="{ open: {{ request()->is('staff-roles/*') ? 'true' : 'false' }} }" @click="open = !open"
                data-collapse-toggle="staff-roles" disabled>Staff & Roles
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid" style="color: #d1d5db;"></i>
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
            <div class="p-3 bg-sky-900 text-md text-right">{{ env('APP_DEBUG') == true ? 'Debugging on' : ''}} v{{
                env('APP_VER') }}</div>
        </div>
    </nav>
</aside>