<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('update') }} {{ __('work') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('title') }}"/>
                        <x-input wire:model.defer="title" id="title" type="text" class="mt-1 block w-full" />
                        <x-input-error for="title" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="languages" value="{{ __('languages') }}"/>
                        <x-input wire:model.defer="languages" id="languages" type="text" class="mt-1 block w-full" />
                        <x-input-error for="languages" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="client" value="{{ __('client') }}"/>
                        <x-input wire:model.defer="client" id="client" type="text" class="mt-1 block w-full" />
                        <x-input-error for="client" class="mt-2"/>
                    </div>

                    <div class="col-span-6">
                        <x-label for="link" value="{{ __('link') }}"/>
                        <x-input wire:model.defer="link" id="link" type="url" class="mt-1 block w-full" />
                        <x-input-error for="link" class="mt-2"/>
                    </div>

                    <div class="col-span-6 order-last lg:order-none">
                        <div class="flex flex-row items-center justify-center">
                            <div class="relative mt-4">
                                    
                                    @php
                                    $images = App\Models\WorkImages::where('work_id', 
                                    $work_id)->get();
                                    @endphp

                                    @foreach ($images as $item)
                                    <div class="inline-flex">
                                        <div class="inline-flex m-2 h-28 w-28">
                                            <img src="{{ asset('uploads/all') }}/{{ $item->image }}" />
                                        </div>
                                        <svg wire:click.prevent='deleteImage({{$item->id}})' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-500 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @endforeach
                                                                
                                <div class="mb-3">
                                    <label class="form-label">Image Upload</label>
                                    <input type="file" class="form-control" wire:model="images" multiple>
                                    <div wire:loading wire:target="images">Uploading...</div> <br>
                                    @error('images.*') <span class="error mt-1 text-red-600">{{ $message }}</span> @enderror
                                    @error('images') <span class="error mt-1 text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <x-label for="category" value="{{ __('category') }}" />
                        <select wire:model="category" class="w-full border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                            <option value="">-- Processing --</option>    
                                @foreach ($knowledges as $knowledge)
                                    <option value="{{ $knowledge->name }}">{{ $knowledge->name }}</option>
                                @endforeach
                        </select>
                        @error('category') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="desc" value="{{ __('desc') }}"/>
                        <textarea id="desc" class="block mt-1 w-full" type="text" name="desc" wire:model.defer="desc"></textarea>
                        @error('desc') <span class="error text-red-600">{{ $message }}</span> @enderror
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