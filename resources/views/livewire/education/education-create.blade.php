<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('create') }} {{ __('education') }}
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-6">
                        <x-label for="formation" value="{{ __('formation') }}"/>
                        <x-input wire:model.defer="formation" id="formation" type="text" class="mt-1 block w-full" />
                        <x-input-error for="formation" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="institute" value="{{ __('institute') }} "/>
                        <x-input wire:model.defer="institute" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="institute" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="adress" value="{{ __('adress') }}"/>
                        <x-input wire:model.defer="adress" id="adress" class="block mt-1 w-full" type="text" name="adress" />
                        <x-input-error for="adress" class="mt-2"/>            
                    </div>

                    <div class="col-span-6">
                        <x-label for="Date_of_obtaining" value="{{ __('Date of obtaining') }}" />
                        <x-input wire:model="Date_of_obtaining" id="Date_of_obtaining" class="block mt-1 w-full" type="date"/>
                        <x-input-error for="Date_of_obtaining" class="mt-2"/>
                    </div> 
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>
