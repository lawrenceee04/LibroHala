<li>
    <div class="flex items-center p-2">
        <input id="{{ $sortBy }}" type="radio" value="{{ $sortBy }}" name="sort_by" form="sort"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            {{ request()->input('sort_by') == $sortBy ? 'checked' : '' }}>
        <label for="{{ $sortBy }}" class="ms-2 text-sm text-gray-900 dark:text-gray-300">{{ $slot }}</label>
    </div>
</li>