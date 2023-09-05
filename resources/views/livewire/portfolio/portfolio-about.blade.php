<!-- about me section start -->
<div>
    <div class="lg:rounded-2xl bg-white dark:bg-[#111111]">
        <div class="pt-12 md:py-12 px-2 sm:px-5 md:px-10 lg:px-14">
            <!-- about page title -->
            <h2 class="after-effect after:left-52">About Me</h2>
            <!-- personal info for mobile devices start -->
            <div class="lg:hidden">
                <div class="w-full mb-6 lg:mb-0 mx-auto relative bg-white text-center dark:bg-[#111111] px-6 rounded-[20px] mt-[180px] md:mt-[220px] lg:mt-0">
                    <!-- profile image  -->
                    <img src="{{ asset('storage/' . $user->profile_photo_path)}}" 
                        class="w-[240px] absolute left-[50%] transform -translate-x-[50%] h-[240px] drop-shadow-xl mx-auto rounded-[20px] -mt-[140px]"
                        alt="User Avatar" />
                    <div class="pt-[100px] pb-8">
                        <h2 class="mt-6 mb-1 text-[26px] font-semibold dark:text-white"> {{$user->name}}
                        </h2>
                        <h3
                            class="mb-4 text-[#7B7B7B] inline-block dark:bg-[#1D1D1D] px-5 py-1.5 rounded-lg dark:text-[#A6A6A6]">
                            {{$user->ocupation}} </h3>

                        <!-- social media -->
                        <div class="flex justify-center space-x-3">
                            <!-- medium icon and link -->
                            <a href="https://medium.com/" target="_blank" 
                                rel="noopener noreferrer">
                                <span class="socialbtn text-[#1773EA]">
                                    <i class="fab fa-medium"></i>
                                </span>
                            </a>
                    
                            <!-- twitter icon and link -->
                            <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">
                                <span class="socialbtn text-[#1C9CEA]">
                                    <i class="fa-brands fa-twitter"></i>
                                </span>
                            </a>
                            <!-- dribbble icon and link -->
                            <a href="https://dribbble.com/" target="_blank" rel="noopener noreferrer">
                                <span class="socialbtn text-[#e14a84]">
                                    <i class="fa-brands fa-dribbble"></i>
                                </span>
                            </a>
                            <!-- linkedin icon and link -->
                            <a href="https://www.linkedin.com/" target="_blank"
                                rel="noopener noreferrer">
                                <span class="socialbtn text-[#0072b1]">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </span>
                            </a>
                        </div>

                        <!-- personal info start -->
                        <div class="p-7 rounded-2xl mt-7 bg-[#F3F6F6] dark:bg-[#1D1D1D]">
                            <div class="flex border-b border-[#E3E3E3] dark:border-[#3D3A3A] pb-2.5">
                                <span class="socialbtn bg-white dark:bg-black text-[#E93B81] shadow-md">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </span>
                                <div class="text-left ml-2.5">
                                    <p class="text-xs text-[#44566C] dark:text-[#A6A6A6]"> Phone </p>
                                    <p class="dark:text-white">{{$user->phone}}</p>
                                </div>
                            </div>

                            <div class="flex border-b border-[#E3E3E3] dark:border-[#3D3A3A] py-2.5">
                                <span class="socialbtn bg-white dark:bg-black text-[#6AB5B9] shadow-md">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </span>
                                <div class="text-left ml-2.5">
                                    <p class="text-xs text-[#44566C] dark:text-[#A6A6A6]"> Email </p>
                                    <p class="dark:text-white">{{$user->email}}</p>
                                </div>
                            </div>

                            <div class="flex border-b border-[#E3E3E3] dark:border-[#3D3A3A] py-2.5">
                                <span class="socialbtn bg-white dark:bg-black text-[#FD7590] shadow-md">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <div class="text-left ml-2.5">
                                    <p class="text-xs text-[#44566C] dark:text-[#A6A6A6]"> Location </p>
                                    <p class="dark:text-white">{{$user->location}}</p>
                                </div>
                            </div>

                            <div class="flex py-2.5">
                                <span class="socialbtn bg-white dark:bg-black text-[#C17CEB] shadow-md">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <div class="text-left ml-2.5">
                                    <p class="text-xs text-[#44566C] dark:text-[#A6A6A6]"> Birthday </p>
                                    <p class="dark:text-white">{{$user->date_of_birth}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- personal info end -->

                        <!-- dowanload button -->
                        <button class="dowanload-btn">
                            <i class="fa-solid fa-cloud-arrow-down w-5 h-5 mr-2"></i>                               
                            Download
                            CV
                        </button>
                    </div>
                </div>
            </div>
            <!-- personal info for mobile devices end -->

            <div class="lg:grid grid-cols-12 md:gap-10 pt-4 md:pt-[30px] items-center">
                <div class="col-span-12 space-y-2.5">
                    <div class="lg:mr-16">
                        <p class="text-[#44566c] dark:text-color-910 leading-7">{{$user->bio}}</p>
                    </div>
                    <div></div>
                </div>
            </div>

        </div>

        <!-- what i do section start -->
        <div class="pb-12 px-2 sm:px-5 md:px-10 lg:px-14">
            <h3 class="text-[35px] dark:text-white font-bold font-robotoSlab pb-5"> What I do! </h3>
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @forelse ($user->skills as $skill)
                <div class="about-box bg-[#fefaf0] dark:bg-transparent">
                    <img class="w-10 h-10 object-cover block rounded-full " src="{{ asset('storage/'. $skill->icon) }}"
                        alt="icon" />
                    <div class="space-y-2">
                        <h3 class="dark:text-white text-[22px] font-semibold"> {{$skill->name}} </h3>
                        <p class="leading-8 text-gray-lite dark:text-[#A6A6A6]"> {{$skill->desc}}</p>
                    </div>
                </div>
                @empty
                <div class="about-box bg-[#fefaf0] dark:bg-transparent">
                    <img class="w-10 h-10 object-contain block" src="images/icons/icon1.svg"
                        alt="icon" />
                    <div class="space-y-2">
                        <h3 class="dark:text-white text-[22px] font-semibold"> Skill Name </h3>
                        <p class="leading-8 text-gray-lite dark:text-[#A6A6A6]"> Lorem ipsum dolor sit
                            amet, consectetuer adipiscing elit, sed diam euismod volutpat. </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- clients -->
        <div class="px-2 sm:px-5 md:px-10 lg:px-14 pb-8">
            <div class="bg-[#F8FBFB] dark:bg-[#0D0D0D] max-w-full h-auto py-10 rounded-xl">
                <h3 class="text-center dark:text-white text-5xl mb-3 font-semibold"> Clients </h3>
                <!-- slider and slider items -->
                <div class="slickOne text-center px-2 pt-8 pb-3">
                    @forelse ($user->clients as $client)
                    <div x-data="{open: false}" class="row">
                        <button @mouseover="open = true" @mouseleave="open = false">
                            <img class="overflow-hidden brand-img" src="{{ asset('storage/'. $client->logo) }}"
                            alt="brand icon" />
                        </button>
                        <!-- Popover -->
                        <!-- Make sure to add the requisite CSS for x-cloak: https://github.com/alpinejs/alpine#x-cloak -->
                        <div x-cloak x-show.transition="open" id="popover"
                            class="p-3 space-y-1 max-w-xl bg-white rounded shadow-2xl flex flex-col text-xs text-gray-600 font-semibold absolute z-50">
                            <p>{{$client->name}}</p>
                        </div>  
                    </div>
                    @empty
                    <div>
                        <img class="overflow-hidden brand-img" src="images/slider/brand1.png"
                            alt="brand icon" />
                    </div>
                    @endforelse
                </div>
                <!-- slider and slider items end -->
            </div>
        </div>
    </div>
    <!-- popperjs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script>
        function openPopover(event,popoverID){
        let element = event.target;
        while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(popoverID), {
        placement: 'top'
        });
        document.getElementById(popoverID).classList.toggle("hidden");
        }
    </script>
</div>
<!-- about me section start -->