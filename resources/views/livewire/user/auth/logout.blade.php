<div>
    @if (auth()->check())
        <button wire:click="logout" class="group relative">
            Logout
            <div aria-hidden="true"
                class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]">
            </div>
        </button>
    @else
        <a class="group relative" href="{{ route('login') }}">Login
            <div aria-hidden="true"
                class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]">
            </div>
        </a>
        <a class="group relative" href="{{ route('register') }}">Register
            <div aria-hidden="true"
                class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]">
            </div>
        </a>
    @endif
</div>
