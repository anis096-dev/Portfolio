<div>
    <div class="bg-white lg:rounded-2xl dark:bg-[#111111]">
        <div class="container sm:px-5 md:px-10 lg:px-14">
            <div class="py-12 px-4 md:px-0">
                <!-- resume page title -->
                <h2 class="after-effect after:left-44">Resume</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-6 mt-[30px]">
                    <!-- eductation start -->
                    <div>
                        <div class="flex items-center space-x-2 mb-6">
                            <i class="fa-solid text-3xl text-[#F95054] fa-graduation-cap"></i>
                            <h4 class="text-[35px] dark:text-white font-bold font-robotoSlab"> Education </h4>
                        </div>
                        @forelse ($user->educations as $education)
                        <div class="bg-[#fff4f4] dark:bg-transparent py-4 pl-5 pr-3 space-y-2 mb-6 rounded-lg dark:border-[#212425] dark:border-2">
                            <span class="text-tiny text-gray-lite dark:text-[#b7b7b7]">{{\Carbon\Carbon::parse($education->Date_of_obtaining)->format('Y')}}</span>
                            <h3 class="text-xl dark:text-white">{{$education->formation}}</h3>
                            <p class="dark:text-[#b7b7b7]"> {{$education->institute}}, {{$education->adress}} </p>
                        </div>
                        @empty
                        <div class="animate-pulse bg-[#f2f4ff] dark:bg-transparent py-4 pl-5 pr-3 space-y-2 rounded-lg mb-6 dark:border-[#212425] dark:border-2">
                            <h2 class=" dark:text-white text-gray-900 title-font font-semibold">{{__('No Results Found')}}</h2>
                            <p class="text-gray-500">.......</p>
                        </div>
                        @endforelse
                    
                    </div>
                    <!-- eductation end -->

                    <!-- experiment start -->
                    <div>
                        <div class="flex items-center space-x-2 mb-6">
                            <i class="fa-solid text-3xl text-[#F95054] fa-briefcase"></i>
                            <h4 class="text-[35px] dark:text-white font-bold font-robotoSlab"> Experience </h4>
                        </div>
                        @forelse ($user->experiences as $experience)
                        <div class="py-4 pl-5 pr-3 space-y-2 mb-6 rounded-lg bg-[#eef5fa] dark:bg-transparent dark:border-[#212425] dark:border-2">
                            <span class="text-tiny text-gray-lite dark:text-[#b7b7b7]">{{\Carbon\Carbon::parse($education->start_date)->format('Y')}}-{{\Carbon\Carbon::parse($education->end_date)->format('Y')}}</span>
                            <h3 class="text-xl dark:text-white"> {{$experience->occupation}} </h3>
                            <p class="dark:text-[#b7b7b7]"> {{$experience->company}}, {{$experience->adress}} </p>
                        </div>
                        @empty
                        <div class="animate-pulse bg-[#f2f4ff] dark:bg-transparent py-4 pl-5 pr-3 space-y-2 rounded-lg mb-6 dark:border-[#212425] dark:border-2">
                            <h2 class="dark:text-white text-gray-900 title-font font-semibold">{{__('No Results Found')}}</h2>
                            <p class="text-gray-500">.......</p>
                        </div>
                        @endforelse
                    </div>
                    <!-- experiment start -->
                </div>
            </div>
        </div>


        <!-- working section start -->
        <div class="container bg-color-810 dark:bg-[#0D0D0D] py-12 px-2 sm:px-5 md:px-10 lg:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="col-span-1">
                    <h4 class="text-[35px] dark:text-white font-bold font-robotoSlab pb-8"> Working Skills </h4>
                    @forelse ($user->skills as $skill)
                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class=" font-semibold text-[#526377] dark:text-[#A6A6A6]">{{$skill->name}}</span>
                            <span class=" font-semibold text-[#526377] dark:text-[#A6A6A6">{{$skill->rate}}%</span>
                        </div>
                        <div class="w-full bg-[#edf2f2] rounded-full h-1 dark:bg-[#1c1c1c]">
                            <div class="bg-[#FF6464] h-1 rounded-full" style="width: {{$skill->rate}}%"></div>
                        </div>
                    </div>
                    @empty
                    <div class="mb-5">
                        <div class="animate-pulse flex justify-between mb-1">
                            <span class=" font-semibold text-[#526377] dark:text-[#A6A6A6]">No skill
                                found</span>
                            <span class=" font-semibold text-[#526377] dark:text-[#A6A6A6">--%</span>
                        </div>
                        <div class="w-full bg-[#edf2f2] rounded-full h-1 dark:bg-[#1c1c1c]">
                            <div class="bg-[#9272d4] h-1 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="col-span-1">
                    <h4 class="text-[35px] dark:text-white font-bold font-robotoSlab pb-8"> Knowledges </h4>
                    <div class="flex gap-y-5 gap-x-2.5 flex-wrap">
                        @forelse ($user->Knowledges as $knowledge)
                        <button class="resume-btn">{{$knowledge->name}}</button>
                        @empty
                        <button class="animate-pulse resume-btn">Add knowledge..</button>
                        @endforelse  
                    </div>
                </div>
            </div>
        </div>
        <!-- working section end -->
    </div>
</div>
