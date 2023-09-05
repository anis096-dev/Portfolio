<div class="bg-white lg:rounded-2xl dark:bg-[#111111]">
    <div class="container px-4 sm:px-5 md:px-10 lg:px-[60px]">
        <div class="pb-12">
            <h2 class="after-effect after:left-32 mt-12 lg:mt-8">Blogs</h2>
            <div class="grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-[30px] grid gap-x-10 gap-y-7 mb-6">
                <!-- blog items start -->
                @forelse ($user->blogs as $blog)
                <div
                    class="p-5 rounded-lg mb-2 h-full bg-[#fcf4ff] dark:bg-transparent dark:border-[#212425] dark:border-2">
                    <div class="overflow-hidden rounded-lg">
                        <a>
                            <img class="rounded-lg w-full h-48 cursor-pointer transition duration-200 ease-in-out transform hover:scale-110"
                                src="{{ asset('storage/' . $blog->image)}}" alt="blog image" />
                        </a>
                    </div>
                    <div class="flex mt-4 text-tiny text-gray-lite dark:text-[#A6A6A6]">
                        <span>{{\Carbon\Carbon::parse($blog->created_at)->format('d~m~Y')}}</span>
                        <span class="dot-icon">{{$blog->topic}}</span>
                    </div>
                    <h3
                        class="text-lg font-medium dark:text-white duration-300 transition cursor-pointer mt-3 pr-4 hover:text-[#FA5252] dark:hover:text-[#FA5252]">
                        <a wire:click="selectedItem('show',{{ $blog->id }})">{{$blog->title}}</a>
                    </h3>
                </div>   
                @empty
                <div class="p-5 rounded-lg mb-2 h-full bg-[#eefbff] dark:bg-transparent dark:border-[#212425] dark:border-2">
                    <div class="overflow-hidden rounded-lg">
                        <a>
                            <img class="rounded-lg w-full h-48 cursor-pointer transition duration-200 ease-in-out transform hover:scale-110"
                                src="assets/images/blog_images/small/1.jpg" alt="blog image" />
                        </a>
                    </div>
                    <div class="flex mt-4 text-tiny text-gray-lite dark:text-[#A6A6A6]">
                        <span>10 April</span>
                        <span class="dot-icon">Inspiration</span>
                    </div>
                    <h3
                        class="text-lg font-medium dark:text-white duration-300 transition cursor-pointer mt-3 pr-4 hover:text-[#FA5252] dark:hover:text-[#FA5252]">
                        <a> Everything You Need to Know About Web
                            Accessibility. </a>
                    </h3>
                </div> 
                @endforelse
                <!-- blog items end -->
            </div>

            <!-- modal  for item start -->
            <livewire:portfolio.portfolio-blog-show/>
            <!-- modal  for item end -->
        </div>
    </div>
</div>