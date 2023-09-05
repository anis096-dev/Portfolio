<div class="bg-white lg:rounded-2xl dark:bg-[#111111]">
    <div class="container px-4 sm:px-5 md:px-10 lg:px-[60px]">
        <div class="pb-12">
            <h2 class="after-effect after:left-36 ml mt-12 lg:mt-8">Works</h2>
            <ul class="mt-[40px] flex w-full justify-start md:justify-end flex-wrap font-medium pb-12">
                @foreach ($knowledges as $item)
                <li class="fillter-btn text-sm mr-4 md:mx-2">{{$item->name}}</li>
                @endforeach
            </ul>
            <div class="grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-[30px] grid gap-x-10 gap-y-7 mb-6">
                <!-- work items start -->
                @forelse ($user->works as $work)
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

            <!-- modal  for item start -->
            <livewire:portfolio.portfolio-work-show/>
            <!-- modal  for item end -->
        </div>
    </div>
</div>