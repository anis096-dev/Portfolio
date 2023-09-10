<!-- sidber personal info -->
<div class="col-span-12 lg:col-span-4 hidden lg:block h-screen sticky top-44">
    <div
        class="w-full mb-6 lg:mb-0 mx-auto relative bg-white text-center dark:bg-[#111111] px-6 rounded-[20px] mt-[180px] md:mt-[220px] lg:mt-0">
        <!-- profile image -->
        <img src="{{ asset('storage/' . $user->profile_photo_path)}}" 
            class="w-[240px] absolute left-[50%] transform -translate-x-[50%] h-[240px] drop-shadow-xl mx-auto rounded-[20px] -mt-[140px]"
            alt="User Avatar"  />
        <div class="pt-[100px] pb-8">
            <h2 class="mt-6 mb-1 text-[26px] font-semibold dark:text-white"> {{$user->name}} </h2>
            <h3
                class="mb-4 text-[#7B7B7B] inline-block dark:bg-[#1D1D1D] px-5 py-1.5 rounded-lg dark:text-[#A6A6A6]">
                {{$user->occupation}} </h3>
            <div class="flex justify-center space-x-3">
                <!-- medium icon and link -->
                <a href="{{$user->medium}}" target="_blank" rel="noopener noreferrer">
                    <span class="socialbtn text-[#1773EA]">
                        <i class="fab fa-medium"></i>
                    </span>
                </a>
                <!-- twitter icon and link -->
                <a href="{{$user->twitter}}" target="_blank" rel="noopener noreferrer">
                    <span class="socialbtn text-[#1C9CEA]">
                        <i class="fa-brands fa-twitter"></i>
                    </span>
                </a>
                <!-- dribbble icon and link -->
                <a href="{{$user->dribble}}" target="_blank" rel="noopener noreferrer">
                    <span class="socialbtn text-[#e14a84]">
                        <i class="fa-brands fa-dribbble"></i>
                    </span>
                </a>
                <!-- linkedin icon and link -->
                <a href="{{$user->linkedin}}" target="_blank" rel="noopener noreferrer">
                    <span class="socialbtn text-[#0072b1]">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </span>
                </a>
            </div>
            <!-- personal infomation start -->
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
            <!-- personal infomation end-->
            <!-- dowanload button -->
            <button class="dowanload-btn">                               
                <a href="{{$user->CV_drive}}" target="_blank"
                    rel="noopener noreferrer">
                    <i class="fa-solid fa-cloud-arrow-down w-5 h-5 mr-2"></i>
                    Download
                    CV
                </a>
                </button>
        </div>
    </div>
</div>


