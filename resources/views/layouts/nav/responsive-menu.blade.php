<ul class="flex">
    <li class="flex ml-3 mr-3 justify-center"> 
        <x-responsive-nav-link class="rounded-lg" href="{{ route('about') }}" :active="request()->routeIs('about')">
            <span class="text-xl ml-3 mb-1">
                <i class="fa-solid fa-user"></i>
            </span>
            {{ __('About') }}
        </x-responsive-nav-link>
    </li>
    <li class="flex ml-3 mr-3 justify-center"> 
        <x-responsive-nav-link class="rounded-lg" href="{{ route('resume') }}" :active="request()->routeIs('resume')">
            <span class="text-xl ml-4 mb-1">
                <i class="fa-regular fa-file-lines"></i>
            </span>
            {{ __('Resume') }}
        </x-responsive-nav-link>
    </li>
    <li class="flex ml-3 mr-3 justify-center"> 
        <x-responsive-nav-link class="rounded-lg" href="{{ route('work') }}" :active="request()->routeIs('work')">
            <span class="text-xl ml-3 mb-1">
                <i class="fas fa-briefcase"></i>
            </span>
            {{ __('Works') }}
        </x-responsive-nav-link>
    </li>
    <li class="flex ml-3 mr-3 justify-center"> 
        <x-responsive-nav-link class="rounded-lg" href="{{ route('blog') }}" :active="request()->routeIs('blog')">
            <span class="text-xl ml-3 mb-1">
                <i class="fa-brands fa-blogger"></i>
            </span> 
            {{ __('Blogs') }}
        </x-responsive-nav-link>
    </li>
    <li class="flex ml-3 mr-3 justify-center"> 
        <x-responsive-nav-link class="rounded-lg" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
            <span class="text-xl ml-3 mb-1">
                <i class="fa-solid fa-address-book"></i>
            </span>
            {{ __('Contact') }}
        </x-responsive-nav-link>
    </li>
</ul>