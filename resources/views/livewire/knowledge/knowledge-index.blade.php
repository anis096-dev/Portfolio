<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 text-primary-700 dark:text-primary-400">
            {{ __('knowledges') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pr-0 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-5 overflow-hidden text-gray-800 shadow-xl lg:px-0 sm:px-10 bg-gray-50 sm:rounded-lg lg:rounded-3xl dark:bg-gray-900 dark:text-gray-400">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-row flex-1 w-full max-w-full px-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300"> {{ __('knowledges') }}</h3>
                            </div>
                            <div class="ml-4">
                                <x-button wire:click="add()">
                                        <x-svg.svg-plus class="w-5 h-5"/>
                                    {{ __('Add knowledge') }}
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-0 overflow-hidden mt-7">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr class="text-sm font-semibold text-gray-500 border-y ltr:text-left rtl:text-right dark:border-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/30">
                                <th class="px-2 py-3 text-center">{{ __('name') }}</th>
                                <th class="px-2 py-3 text-center"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($knowledges as $index => $knowledge)
                                <tr class="bg-white border-b border-slate-200">
                                    <td class="px-6 py-4">
                                        <input wire:model="knowledges.{{ $index }}.name" type="text" class="bg-gray-50 border border-slate-300  @error('knowledges.' . $index . '.name') border-pink-500 @enderror text-slate-900 text-sm rounded-lg focus: ring-blue-500
                                        focus: border-blue-500 block w-full p-2.5" placeholder="Name...">
                                        @error('knowledges.' . $index . '.name') <span class="font-medium text-sm text-pink-500">{{$message}}</span>@enderror
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-button wire:click="delete({{ $index }})">
                                            <x-svg.svg-delete class="w-5 h-5"/>
                                        </x-button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <x-button wire:click="save()" class="m-3">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
