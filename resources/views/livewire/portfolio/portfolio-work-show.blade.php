<div>
  @if($showItemModel)
  <x-dialog-modal wire:model="showItemModel">
      <x-slot name="title">
          <h2 class="text-[rgb(239,64,96)] dark:hover:text-[#FA5252] text-4xl text-center font-bold">
            {{$item->category}}
            <div class="flex mt-4 text-tiny justify-center text-black">
              @if($item->created_at != $item->updated_at)
              <span class="text-gray-500">{{\Carbon\Carbon::parse($item->updated_at)->format('d~m~Y')}}</span> 
              @else
              <span class="text-gray-500">{{\Carbon\Carbon::parse($item->created_at)->format('d~m~Y')}}</span> 
              @endif
          </div>
          </h2>
      </x-slot>

      <x-slot name="content">
          <div class="modal container">
              <div class="scrollbarLight overflow-y-scroll max-h-[60vh] lg:max-h-[80vh]">    
                  <div class="pr-3 pb-2">
                    <div class="rounded-lg mt-4 bg-gradient-to-r from-[#FA5252] to-[#DD2476] p-[1px] mr-3">
                      <div class="bg-[#ffffff] lg:flex p-4 rounded-lg">
                          <div class="space-y-2">
                            <p class="flex items-center text-[15px] sm:text-lg">
                              <i class="fa-regular fa-file-lines sm:text-lg hidden sm:block mr-4 md:text-xl"></i>
                              <span class="font-bold text-sm">Project:&nbsp;</span>
                              <span class="font-medium text-xs">{{$item->title}}</span>
                            </p>
                            <p class="flex items-center text-[15px] sm:text-lg">
                              <i class="fa-solid fa-code text-lg mr-4 hidden sm:block"></i>
                              <span class="font-bold text-sm">Langages:&nbsp;</span>
                              <span class="font-medium text-xs">{{$item->languages}}</span>
                            </p>
                          </div>
      
                          <div class="space-y-2">
                            <p class="flex items-center mt-2 lg:mt-0 text-[15px] sm:text-lg">
                              <i class="fa-regular fa-user text-lg mr-4 hidden sm:block"></i>
                              <span class="font-bold text-sm">Client:&nbsp;</span>
                              <span class="font-medium text-xs">{{$item->client}}</span>
                            </p>
                            <p class="flex items-center text-[15px] sm:text-lg">
                              <i class="fa-solid fa-arrow-up-right-from-square text-lg mr-4 hidden sm:block"></i>
                              <span class="font-bold text-sm">Preview:&nbsp;</span>
                              <span class="font-medium text-xs transition-all duration-300 ease-in-out hover:text-[#ef4060]">
                                <a href="{{$item->link}}" target="_blank" rel="noopener noreferrer">{{$item->link}}</a>
                              </span>
                            </p>
                          </div>
                      </div>
                    </div>

                    <p class="mt-4 text-2line font-normal text-[15px] sm:text-sm">
                      {!!nl2br($item->desc)!!}
                    </p>

                    @php
                    $images = App\Models\WorkImages::where('work_id', 
                    $item->id)->get();
                    @endphp

                    @foreach ($images as $item)
                    <img class="w-full md:h-[450px] object-cover rounded-xl mt-6" src="{{ asset('uploads/all') }}/{{ $item->image }}"
                        alt="blog image" />
                    @endforeach

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
