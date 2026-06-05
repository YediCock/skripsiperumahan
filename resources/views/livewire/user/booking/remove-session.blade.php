{{-- <div> --}}
    <li>
        @if(session()->has('phone') && session()->has('name'))
            <a role="button" class="group relative cursor-pointer">
                {{ $customerName }} |
                <span wire:click="forgetSession" class="text-red-500 hover:underline">Keluar Akun</span> 
                <div aria-hidden="true"
                    class="absolute top-6 h-[2px] w-0 bg-gradient-to-r from-primary to-primary-400 transition-all duration-500 group-hover:w-[40px]">
                </div>
            </a>
        @endif  
    </li>
{{-- </div> --}}
