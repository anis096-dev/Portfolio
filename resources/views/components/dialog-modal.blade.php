@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="text-lg bg-primary-600 p-4 font-semibold">
        {{ $title }}
    </div>
    <div class="px-6 py-4">
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right">
        {{ $footer }}
    </div>
</x-modal>
