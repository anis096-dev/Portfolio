<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('update') }} {{ __('experience') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-6">
                        <x-label for="occupation" value="{{ __('Occupation') }}"/>
                        <x-input wire:model.defer="occupation" id="occupation" type="text" class="mt-1 block w-full" />
                        <x-input-error for="occupation" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="company" value="{{ __('Company') }} "/>
                        <x-input wire:model.defer="company" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="company" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="adress" value="{{ __('adress') }}"/>
                        <x-input wire:model.defer="adress" id="adress" class="block mt-1 w-full" type="text" name="adress" />
                        <x-input-error for="adress" class="mt-2"/>            
                    </div>

                    <div class="col-span-6">
                        <x-label for="start_date" value="{{ __('Start Date') }}" />
                        <x-input wire:model="start_date" id="start_date" class="block mt-1 w-full" type="date"/>
                        <x-input-error for="start_date" class="mt-2"/>
                    </div> 

                    <div class="col-span-6">
                        <x-label for="end_date" value="{{ __('End Date') }}" />
                        <x-input wire:model="end_date" id="end_date" class="block mt-1 w-full" type="date"/>
                        <x-input-error for="end_date" class="mt-2"/>
                    </div> 

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ltr:ml-3 rtl:mr-3">
                    {{ __('Update') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>