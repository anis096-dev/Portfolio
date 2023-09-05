<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('create') }} {{ __('work') }}
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

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
                        <x-input wire:model.defer="link" id="link" type="text" class="mt-1 block w-full" />
                        <x-input-error for="link" class="mt-2"/>
                    </div>

                    <div class="col-span-6 order-last lg:order-none">
                        <div class="flex flex-row items-center justify-center">
                            <div class="relative mt-4">
                                @if (is_array($images) || is_object($images))                   
                                @forelse ($images as $item)
                                <div class="inline-flex m-2 h-28 w-28">
                                    <img src="{{ $item->temporaryUrl() }}">
                                </div>
                                @empty
                                @endforelse
                                @endif
                                <div class="flex items-center justify-center">
                                    <label for="dropzone-file" class="inline-flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="inline-flex flex-col items-center justify-center m-4 pb-2 md:px-44">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1MB/Image)</p>
                                            <p class=" text-orange-600 mt-2" wire:loading wire:target="images">Uploading...</p>
                                        </div>
                                        <input wire:model="images" id="dropzone-file" type="file" class="hidden" multiple />
                                        @error('images.*') <span class="error mt-1 text-red-600">{{ $message }}</span> @enderror
                                        @error('images') <span class="error mt-1 text-red-600">{{ $message }}</span> @enderror
                                    </label>
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