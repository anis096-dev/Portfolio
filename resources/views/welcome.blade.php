{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- common meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="images/logo/faveicon.jpg" type="image/x-icon">
        <!--=== fontaswesome ===-->
        <link rel="stylesheet" href="{{asset('assets/fontaswesome/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/fontaswesome/css/fontawesome.min.css')}}" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600&amp;family=Roboto+Slab:wght@300;400;500;600;700&amp;display=swap"
            rel="stylesheet" />
        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/slick.css')}}" />
        <!--=== main css ===-->
        <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

        <title>Porfolio</title>
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem("color-theme") === "dark" || (!("color-theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
        </script>
    </head>
    <body>
        <!-- PRELOADER -->
        <div id="preloader">
            <div class="loader_line"></div>
        </div>
        <!-- /PRELOADER -->

        <div class="bg-homeBg dark:bg-homeTwoBg-dark min-h-screen bg-no-repeat bg-center bg-cover bg-fixed md:pb-16 w-full">
            <div class="section-bg">
                <div class="w-full flex justify-between px-4">
                    <!-- website Logo -->
                    <a href="index.html">
                        <img class="h-[26px] lg:h-[32px]" src="images/logo/logo.png" alt="logo" />
                    </a>
                    <div class="flex items-center">
                        <!-- dark and light mode toggle -->
                        <button id="theme-toggle" type="button" class="dark-light-btn">
                            <i id="theme-toggle-dark-icon" class="fa-solid text-xl fa-moon hidden"></i>
                            <i id="theme-toggle-light-icon" class="fa-solid fa-sun text-xl hidden"></i>
                        </button>
                        <!-- mobile toggle button -->
                        <button id="menu-toggle" type="button" class="menu-toggle-btn">
                            <i id="menu-toggle-open-icon" class="fa-solid fa-bars text-xl "></i>
                            <i id="menu-toggle-close-icon" class="fa-solid fa-xmark text-xl hidden  "></i>
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- mobile menu start -->
            <nav id="navbar" class="hidden lg:hidden">
                @include('layouts.nav.dropdown')
            </nav>
            <!-- mobile menu end -->
    
            <div class="container grid grid-cols-12 md:gap-10 justify-between lg:mt-[220px]">
                <!-- sidber personal info -->
                <livewire:portfolio-index>
                <!-- sidber personal info end -->
                <div class="col-span-12 lg:col-span-8">
                    <!-- header for mobile devices start -->
                    <header
                        class="lg:w-[560px] h-[144px] hidden lg:block p-[30px] ml-auto mb-10 rounded-[16px] bg-white dark:bg-[#111111]">
                        <nav class="hidden lg:block">
                            @include('layouts.nav.responsive-menu')
                        </nav>
                    </header>
                    <!-- header for mobile devices end -->
    
                    <!-- about me section start -->
                    <livewire:portfolio-about>
                    <!-- about me section start -->
                    <!-- footer start -->
                    <footer class="overflow-hidden rounded-b-2xl" style="background: transparent">
                        <p class="text-center py-6 text-gray-lite dark:text-color-910"> © 2022 All Rights Reserved
                            by <a class="hover:text-[#FA5252] duration-300 transition"
                                href="https://themeforest.net/user/ib-themes" target="_blank"
                                rel="noopener noreferrer"> ib-themes</a>. </p>
                    </footer>
                    <!-- footer section end -->
                </div>
            </div>
        </div>

        <!--==== js =====-->
        <script src="{{asset('assets/js/vendor/jquary.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/slick.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html> --}}