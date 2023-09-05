<div wire:init="loadItems">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 text-primary-700 dark:text-primary-400">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pr-0 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-5 overflow-hidden text-gray-800 shadow-xl lg:px-0 sm:px-10 bg-gray-50 sm:rounded-lg lg:rounded-3xl dark:bg-gray-900 dark:text-gray-400">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-row flex-1 w-full max-w-full px-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300"> {{ __('clients') }}</h3>
                            </div>
                            <div class="ml-4">
                                <x-button wire:click="selectedItem('create', null)">
                                        <x-svg.svg-plus class="w-5 h-5"/>
                                    {{ __('create') }}  {{ __('client') }}
                                </x-button>
                            </div>
                        </div>

                        <div class="relative grid grid-cols-6 gap-6 mt-2 ">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2">
                                <x-label class="text-xs" for="search" value="{{ __('search') }}"/>
                                <x-input wire:model="term" id="search" type="text" class="block w-full mt-1"
                                             autocomplete="off"/>
                            </div>
                            <div class="col-span-3 md:col-span-2 lg:col-span-1">
                                <x-label class="text-xs" for="select" value="{{ __('PerPage') }}"/>
                                <x-select wire:model="perPage" class="mt-1">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </x-select>
                            </div>

                            <div class="col-span-3 md:col-span-2 lg:col-span-2">
                                <x-label class="text-xs" for="trashed" value="{{ __('Show Trashed') }}"/>
                                <x-checkbox wire:model="trashed" value="true" class="block mt-3 w-7 h-7"/>
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
                                <th class="px-2 py-3 text-center">{{ __('logo') }}</th>
                                <th class="px-2 py-3 text-center">{{ $trashed ? __('deleted_at') : __('created_at') }}</th>
                                <th class="px-2 py-3 text-center">{{ __('actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-900">
                            @forelse($clients as $client)
                                <tr class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:dark:text-gray-200 hover:bg-gray-100 hover:dark:bg-gray-700">
                                    <td class="px-2 py-3 text-sm text-center lowercase">
                                        {{ $client->name }}
                                    </td>

                                    <td class="px-2 py-3 text-sm text-center lowercase">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ asset('storage/'. $client->logo) }}"
                                        alt=""
                                        />
                                    </td>

                                    <td class="px-2 py-3 text-sm text-center">
                                        {{ $trashed ? $client->deleted_at->diffForHumans() : $client->created_at->diffForHumans() }}
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-between gap-1 text-sm text-center">

                                            @if($trashed)
                                                <x-button2 wire:click="selectedItem('restore',{{ $client->id }})"
                                                                class="px-2">
                                                    <x-svg.svg-restore class="w-5 h-5"/>
                                                </x-button2>

                                                <x-button2
                                                        wire:click="selectedItem('forceDelete',{{ $client->id }})"
                                                        class="px-2">
                                                    <x-svg.svg-force-delete class="w-5 h-5"/>
                                                </x-button2>
                                            @else
                                                <x-button2 wire:click="selectedItem('update',{{ $client->id }})"
                                                                class="px-2">
                                                    <x-svg.svg-update class="w-5 h-5"/>
                                                </x-button2>

                                                <x-button2 wire:click="selectedItem('delete',{{ $client->id }})"
                                                                class="px-2">
                                                    <x-svg.svg-delete class="w-5 h-5"/>
                                                </x-button2>
                                            @endif


                                        </div>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="7"
                                        class="px-4 py-3 text-sm text-center text-gray-700 dark:text-gray-400">{{ __('No Data') }}</td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(!empty($clients))
                        <div class="px-4 py-3 border-t dark:border-gray-700">
                            {{ $clients->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <livewire:client.client-create/>
    <livewire:client.client-update/>
    <livewire:client.client-delete/>
</div>
