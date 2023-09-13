<ul class="block rounded-b-[20px] shadow-md absolute left-0 top-20 z-[22222222222222] w-full bg-white dark:bg-[#1d1d1d]">
    <li class="p-3 space-y-1">
        <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
            <span class="mr-2 text-xl">
                <i class="fa-solid fa-user"></i>
            </span>
            {{ __('About') }}
        </x-nav-link>
    </li>
    <li class="p-3 space-y-1">
        <x-nav-link href="{{ route('resume') }}" :active="request()->routeIs('resume')">
            <span class="mr-2 text-xl">
            <i class="fa-regular fa-file-lines"></i>
            </span>
            {{__('Resume')}}
        </x-nav-link>
    </li>
    <li class="p-3 space-y-1">
        <x-nav-link href="{{ route('work') }}" :active="request()->routeIs('work')">
            <span class="mr-2 text-xl">
                <i class="fas fa-briefcase"></i>
            </span>
            {{__('Works')}}
        </x-nav-link>
    </li>
    <li class="p-3 space-y-1">
        <x-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
            <span class="mr-2 text-xl">
                <i class="fa-brands fa-blogger"></i>
            </span>
            {{__('Blogs')}}
        </x-nav-link>
    </li>
    <li class="p-3 space-y-1">
        <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
            <span class="mr-2 text-xl">
                <i class="fa-solid fa-address-book"></i>
            </span>
            {{__('Contact Me')}}
        </x-nav-link>
    </li>
</ul>