<div>
    @if($showItemModel)
    <x-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{-- {{ __('show') }} {{ __('blog') }} --}}
        </x-slot>

        <x-slot name="content">
            <div class="modal container">
                <div class="dark:scrollbarDark scrollbarLight overflow-y-scroll max-h-[60vh] lg:max-h-[80vh]">    
                    <div class="pr-3 pb-2">
                        <img class="w-full md:h-[450px] object-cover rounded-xl mt-6" src="{{ asset('storage/' . $item->image)}}"
                            alt="blog image" />
                        <div class="flex mt-4 text-tiny text-black">
                            @if($item->created_at != $item->updated_at)
                            <span class="text-gray-500">{{\Carbon\Carbon::parse($item->updated_at)->format('d~m~Y')}}</span> 
                            @else
                            <span class="text-gray-500">{{\Carbon\Carbon::parse($item->created_at)->format('d~m~Y')}}</span> 
                            @endif
                            <span class="ml-1 font-bold dot-icon">{{$item->topic}}</span>
                        </div>
                        <h2 class="sm:text-3xl mt-2 font-medium">{{$item->title}}</h2>
                        <p class="font-normal text-[15px] sm:text-sm my-4">
                            {!!nl2br($item->desc)!!}
                        </p>
                    </div>

                    <div class="rounded-lg mt-6 bg-gradient-to-r from-[#FA5252] to-[#DD2476] p-[1px] mr-3">
                        <div class="bg-[#ffffff] flex p-4 rounded-lg">
                            <div>
                                <img class="md:w-[125px] rounded-xl" src="{{ asset('storage/' . $user->profile_photo_path)}}" alt="user" />
                            </div>
                            <div class="pl-5">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-[22px] font-medium pb-1">{{$user->name}}</h3>
                                </div>
                                <p class="md:pr-16">{{$user->bio}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>

    </x-dialog-modal>
    @endif
</div>
