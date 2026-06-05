<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/frontendNew/styles/aos.css" />
<link rel="stylesheet" href="/frontendNew/styles/odometer-theme-default.css" />
<link rel="stylesheet" href="/frontendNew/styles/swiper-bundle.min.css" />
<link rel="stylesheet" href="/frontendNew/styles/styles.css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Sedayu Utama Sejahtera Perumahan</title>
</head>
<body class="z-[100] bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    <header class="sticky left-0 top-0 z-50 flex h-nav-2 items-center bg-white shadow-sm">
        <nav class="container flex items-center justify-between px-3 2xl:px-0">
            <div>
                <a href="/">
                <img src="logo.jpeg" width="75" alt="Homelist" class="shrink-0" />
                </a>
            </div>
            <div class="flex items-center gap-x-6 text-nature-500">
                <menu class="mr-2.5 hidden items-center gap-x-3 text-sm font-semibold hover::text-primary hover::duration-300 md:flex lg:gap-x-5 lg:text-[17px] xl:space-x-6">
                <li role="button" id="homesDropdownButton" data-dropdown-trigger="hover">
                    <a class="group relative" role="button" href="/">Home
                        <div aria-hidden="true" class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]"></div>
                    </a>
                </li>
                <li role="button" id="homesDropdownButton" data-dropdown-trigger="hover">
                    <a class="group relative" role="button" href="{{ route('search') }}">Search
                        <div aria-hidden="true" class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative" href="{{ route('booking') }}">Bookings
                        <div aria-hidden="true" class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative" href="/wishlist">Whislist
                        <div aria-hidden="true" class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]"></div>
                    </a>
                </li>
                <li>
                    <livewire:user.auth.logout />
                </li>
                </menu>
                <button class="md:hidden" type="button" data-drawer-target="responsive-menu" data-drawer-show="responsive-menu" aria-controls="responsive-menu">
                <svg class="size-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="200px" width="200px" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                    <path d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z"></path>
                </svg>
                </button>
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="section-padding-t bg-white pt-10">
        <div class="container mb-6 grid w-full max-w-[1230px] grid-cols-6 gap-3 px-3 md:mb-10 md:grid-cols-5 lg:mb-14 2xl:px-0">
            <div data-aos="fade-up" class="col-span-4 md:col-span-2">
                <a href="" class="flex items-center gap-x-3">
                <img src="logo.jpeg" width="75" alt="Homelist" />
                </a>
                <div class="mt-10">
                <h5 class="mb-5 text-lg font-bold text-gray-800 md:text-xl">Alamat</h5>
                <address class="font-poppins text-sm text-gray-500 md:text-base">
                    <span class="my-2 block">+(62) 851 6563 1608</span>
                    Perumahan Puri Harapan Sentosa 2 , Kandeman <br />
                    Batang, Jawa Tengah, Indonesia 51264
                </address>
                </div>
            </div>
        </div>
        <div class="container max-w-[1230px]">
            <hr />
        </div>
        <div class="container mb-3.5 mt-5 flex max-w-[1230px] flex-col items-center justify-center gap-y-3.5 px-3 md:mb-6 md:mt-10 md:flex-row md:justify-between lg:mb-9 lg:mt-[54px] 2xl:px-0">
            <p class="text-sm leading-[14px] text-gray-500">&copy;2025 Sedayu Utama Sejahtera Home</p>
        </div>
    </footer>

    <div id="responsive-menu" tabindex="-1" aria-labelledby="responsive-menu-label" class="fixed left-0 top-0 z-[60] h-screen w-64 -translate-x-full overflow-y-auto border-r bg-white p-4 transition-transform">
        <a href="#">
            <img src="logo.jpeg" width="100" />
        </a>
        <button type="button" data-drawer-hide="responsive-menu" aria-controls="responsive-menu" class="absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900">
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="overflow-y-auto py-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-house h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('search') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-magnifying-glass h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Search</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('booking') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-calendar-check h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="/wishlist" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-heart h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Wishlist</span>
                    </a>
                </li>
                <li>
                    <div class="mt-6 flex ms-2 items-center gap-x-2 text-gray-700 hover:text-gray-900 cursor-pointer group">
                        @if(session()->has('phone') && session()->has('name'))
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                        @endif  
                        <ul class="inline">
                            <livewire:user.auth.logout />
                        </ul>
                    </div>
                </li>          
            </ul>
        </div>
    </div>

    <script src="/frontendNew/js/fontawesome.min.js"></script>
    <script src="/frontendNew/js/flowbite.min.js"></script>
    <script src="/frontendNew/js/aos.js"></script>
    <script src="/frontendNew/js/odometer.js"></script>
    <script src="/frontendNew/js/swiper-bundle.min.js"></script>
    <script src="/frontendNew/js/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script>
        AOS.init({ delay: 0, duration: 600 });
        const swiper = new Swiper(".user-reviews-swiper", {
            slidesPerView: 4,
            pagination: { el: ".reviews-swiper-pagination", clickable: true },
            autoplay: { delay: 2500, disableOnInteraction: false },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 10 },
                320: { slidesPerView: 2, spaceBetween: 10 },
                640: { slidesPerView: 2, spaceBetween: 15 },
                768: { slidesPerView: 3, spaceBetween: 20 },
                1024: { slidesPerView: 4, spaceBetween: 30 }
            }
        });
    </script>
</body>
</html>