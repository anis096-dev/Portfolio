<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs dark:text-gray-800 uppercase tracking-widest hover:bg-primary-600 dark:hover:bg-white focus:bg-primary-700 dark:focus:bg-white active:bg-primary-900 dark:active:bg-primary-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
