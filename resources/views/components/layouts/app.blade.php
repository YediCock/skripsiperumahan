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
                <img src="/logo.jpeg" width="75" alt="Homelist" class="shrink-0" />
                </a>
            </div>
            <div class="flex items-center gap-x-6 text-nature-500">
                <menu class="mr-2.5 hidden items-center gap-x-3 text-sm font-semibold hover::text-primary hover::duration-300 md:flex lg:gap-x-5 lg:text-[17px] xl:space-x-6">
                @php $currentRoute = request()->route()?->getName(); @endphp
                <li>
                    <a class="group relative {{ $currentRoute === 'homepage' ? 'text-primary' : '' }}" href="/">Home
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'homepage' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative {{ $currentRoute === 'tentangKami' ? 'text-primary' : '' }}" href="{{ route('tentangKami') }}">Tentang Kami
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'tentangKami' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative {{ $currentRoute === 'search' ? 'text-primary' : '' }}" href="{{ route('search') }}">Properti
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'search' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative {{ $currentRoute === 'faq' ? 'text-primary' : '' }}" href="{{ route('faq') }}">FAQ
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'faq' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative {{ $currentRoute === 'booking' ? 'text-primary' : '' }}" href="{{ route('booking') }}">Bookings
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'booking' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
                    </a>
                </li>
                <li>
                    <a class="group relative {{ $currentRoute === 'wishlist' ? 'text-primary' : '' }}" href="/wishlist">Wishlist
                        <div aria-hidden="true" class="absolute top-6 h-[2px] bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 {{ $currentRoute === 'wishlist' ? 'w-[40px]' : 'w-0 group-hover:w-[40px]' }}"></div>
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
            @php $footerSetting = \App\Models\Setting::first(); @endphp
            <div data-aos="fade-up" class="col-span-4 md:col-span-2">
                <a href="/" class="flex items-center gap-x-3">
                @if($footerSetting && $footerSetting->image_logo)
                    <img src="{{ asset('storage/images/settings/' . $footerSetting->image_logo) }}" width="75" alt="{{ $footerSetting->company_name }}" />
                @else
                    <img src="/logo.jpeg" width="75" alt="Logo" />
                @endif
                </a>
                <div class="mt-6">
                <h5 class="mb-3 text-lg font-bold text-gray-800 md:text-xl">{{ $footerSetting->company_name ?? 'Perumahan' }}</h5>
                <address class="font-poppins text-sm text-gray-500 md:text-base not-italic">
                    @if($footerSetting && $footerSetting->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $footerSetting->phone) }}"
                        target="_blank"
                        class="my-2 flex items-center gap-1 text-green-600 hover:underline w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        {{ $footerSetting->phone }}
                    </a>
                    @endif
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
                    <a href="{{ route('tentangKami') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-circle-info h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Tentang Kami</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('search') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-magnifying-glass h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">Properti</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <i class="fa-solid fa-circle-question h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                        <span class="ms-3 flex-1 whitespace-nowrap text-left">FAQ</span>
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

    <!-- Floating WhatsApp Button -->
    @php $waSettings = \App\Models\Setting::first(); @endphp
    @if($waSettings && $waSettings->phone)
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $waSettings->phone) }}"
        target="_blank"
        class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-green-500 text-white shadow-lg hover:bg-green-600 transition-all duration-300 hover:scale-110"
        title="Hubungi via WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    @endif
    <!-- End Floating WhatsApp Button -->

    <script src="/frontendNew/js/fontawesome.min.js"></script>
    <script src="/frontendNew/js/flowbite.min.js"></script>
    <script src="/frontendNew/js/aos.js"></script>
    <script src="/frontendNew/js/odometer.js"></script>
    <script src="/frontendNew/js/swiper-bundle.min.js"></script>
    <script src="/frontendNew/js/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script>
        (function () {
            function initPage() {
                if (window.AOS) AOS.init({ delay: 0, duration: 600 });
                var el = document.querySelector('.user-reviews-swiper');
                if (el && typeof Swiper !== 'undefined') {
                    if (el.swiper) el.swiper.destroy(true, true);
                    new Swiper('.user-reviews-swiper', {
                        slidesPerView: 4,
                        pagination: { el: '.reviews-swiper-pagination', clickable: true },
                        autoplay: { delay: 2500, disableOnInteraction: false },
                        breakpoints: {
                            0:    { slidesPerView: 1, spaceBetween: 10 },
                            320:  { slidesPerView: 2, spaceBetween: 10 },
                            640:  { slidesPerView: 2, spaceBetween: 15 },
                            768:  { slidesPerView: 3, spaceBetween: 20 },
                            1024: { slidesPerView: 4, spaceBetween: 30 }
                        }
                    });
                }
            }
            initPage();
            document.addEventListener('livewire:navigated', initPage);
        })();
    </script>
</body>
</html>
