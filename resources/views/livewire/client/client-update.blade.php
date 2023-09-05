<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('update') }} {{ __('client') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2 lg:col-span-4">
                        <x-label for="name" value="{{ __('name') }}"/>
                        <x-input wire:model.defer="name" type="text" class="mt-1 block w-full" />
                        <x-input-error for="name" class="mt-2"/>
                    </div>

                    <div class="flex flex-row items-center justify-center">
                        <div class="relative mt-4">
                            <div class="w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded-full">
                                @if(!empty($logoPath))

                                    <img src="{{ $logoPath->temporaryUrl() }}"
                                         class="object-cover w-24 h-24 rounded-full">

                                @elseif(!empty($logo))
                                    <img src="{{ asset('storage/'. $logo) }}"
                                         class="object-cover w-24 h-24 rounded-full">
                                @endif
                            </div>
                            <span class="absolute bottom-0 left-0 w-8 h-8 p-2 rounded-full bg-primary-600 shadow-md">
                            <label>
                                <svg wire:target="logoPath" wire:loading.class="animate-bounce" class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                                <input wire:model="logoPath" type="file" accept="image/png, image/jpeg" class="hidden opacity-0">
                            </label>
                            </span>
                                <x-input-error for="logoPath" class="mt-2"/>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('update') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>