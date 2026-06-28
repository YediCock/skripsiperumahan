<div>
    @if ($adminMode)
        <button wire:click="logout"
            style="background:none;border:none;padding:0;width:100%;text-align:left;cursor:pointer;color:inherit;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out" style="vertical-align:middle;margin-right:6px"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span>Logout</span>
        </button>
    @elseif (auth()->check())
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="group relative flex items-center gap-1 font-semibold">
                <i class="fa-solid fa-circle-user text-primary text-lg"></i>
                <span class="hidden md:inline text-sm">{{ auth()->user()->name }}</span>
                <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" @click.outside="open = false"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 -translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="absolute right-0 top-9 z-50 min-w-[160px] rounded-xl border bg-white py-2 shadow-lg">
                <a href="{{ route('booking') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <i class="fa-solid fa-calendar-check w-4 text-primary"></i> Bookings
                </a>
                <a href="{{ route('wishlist') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <i class="fa-solid fa-heart w-4 text-primary"></i> Wishlist
                </a>
                <hr class="my-1" />
                <button wire:click="logout" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                    <i class="fa-solid fa-right-from-bracket w-4"></i> Logout
                </button>
            </div>
        </div>
    @else
        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}" class="group relative text-sm font-semibold">
                Login
                <div aria-hidden="true" class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-full"></div>
            </a>
            <a href="{{ route('register') }}"
                class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-primary-400 transition">
                Daftar
            </a>
        </div>
    @endif
</div>
