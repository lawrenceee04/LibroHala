<th scope="col"
    class="p-4 text-xs font-medium text-left text-gray-800 uppercase dark:text-gray-400 {{ request()->input('sort_by') == $slot ? 'bg-sky-500' : '' }}">
    {{ $slot }}
</th>
