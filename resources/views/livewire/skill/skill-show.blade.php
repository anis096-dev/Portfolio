<div>
    @if($showItemModel)
        <x-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('show') }} {{ __('skill') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">

                <div class="col-span-2 md:col-span-4 lg:col-span-1 lg:row-span-3 order-last lg:order-none">
                    <div class="flex flex-row items-center justify-center">
                        <div class="relative mt-4">
                            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full">
                                @if(!empty($item->icon))
                                    <img src="{{ asset('storage/' .$item->icon) }}"
                                         class="object-cover w-20 h-20 rounded-full">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->name }}</div>
                    </div>
                </div>


                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('desc') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->desc }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('rate') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->rate }} <span class="font-bold">%</span></div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->created_at }}</div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="relative p-3 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-t-lg">{{ __('updated_at') }}</div>
                            <div class=" text-sm font-bold z-10">{{ $item->updated_at }}</div>
                        </div>
                    </div>
                @endif

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

        </x-slot>

    </x-dialog-modal>
    @endif

</div>