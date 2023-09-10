<div class="bg-white lg:rounded-2xl dark:bg-[#111111]">
    <div class="container px-4 sm:px-5 md:px-10 lg:px-[60px]">
        <div class="pb-12">
            <h2 class="after-effect after:left-36 ml mt-12 lg:mt-8">Works</h2>
            <div class="mt-[40px] flex w-full justify-start md:justify-end flex-wrap font-medium pb-12">
                <select wire:model="selectedCategory" class="border border-gray-300 text-gray-600 h-14 mr-1 rounded bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">{{__('--Category--')}}</option>
                    @forelse($knowledges as $item)
                    <option>{{$item->name}}</option>    
                    @empty
                    <option>{{__('empty..')}}</option>
                    @endforelse
                </select>
                <button wire:click="resetFilter" class="border border-gray-300 text-center h-14 p-2 mr-1 border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none appearance-none">
                    {{__('reset All')}}
                </button>
            </div>
            
            <div class="grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-[30px] grid gap-x-10 gap-y-7 mb-6">
                <!-- work items start -->
                @forelse ($data as $work)
                <div
                    class="p-5 rounded-lg mb-2 h-full bg-[#fcf4ff] dark:bg-transparent dark:border-[#212425] dark:border-2">
                    <div class="overflow-hidden rounded-lg">
                        <a>
                            @php
                            $images = App\Models\WorkImages::where('work_id', 
                            $work->id)->get();
                            @endphp
                            <img class="rounded-lg w-full h-48 cursor-pointer transition duration-200 ease-in-out transform hover:scale-110"
                             src="{{ asset('uploads/all') }}/{{ $images[0]->image }}" alt="">
                        </a>
                    </div>
                    <div class="flex mt-4 text-tiny text-gray-lite dark:text-[#A6A6A6]">
                        <span>{{\Carbon\Carbon::parse($work->created_at)->format('d~m~Y')}}</span>
                        <span class="dot-icon">{{$work->category}}</span>
                    </div>
                    <h3
                        class="text-lg font-medium dark:text-white duration-300 transition cursor-pointer mt-3 pr-4 hover:text-[#FA5252] dark:hover:text-[#FA5252]">
                        <a wire:click="selectedItem('show',{{ $work->id }})">{{$work->title}}</a>
                    </h3>
                </div>   
                @empty
                <div class="p-5 rounded-lg mb-2 h-full bg-[#eefbff] dark:bg-transparent dark:border-[#212425] dark:border-2">
                    <div class="overflow-hidden rounded-lg">
                        <a>
                            <img class="rounded-lg w-full h-48 cursor-pointer transition duration-200 ease-in-out transform hover:scale-110"
                                src="assets/images/work_images/small/1.jpg" alt="work image" />
                        </a>
                    </div>
                    <div class="flex mt-4 text-tiny text-gray-lite dark:text-[#A6A6A6]">
                        <span class="dot-icon">Inspiration</span>
                    </div>
                    <h3
                        class="text-lg font-medium dark:text-white duration-300 transition cursor-pointer mt-3 pr-4 hover:text-[#FA5252] dark:hover:text-[#FA5252]">
                        <a> Everything You Need to Know About Web
                            Accessibility. </a>
                    </h3>
                </div> 
                @endforelse
                <!-- work items end -->
            </div>
            <div class="mt-5">
                {{ $data->links() }}
            </div>

            <!-- modal  for item start -->
            <livewire:portfolio.portfolio-work-show/>
            <!-- modal  for item end -->
        </div>
    </div>
</div>