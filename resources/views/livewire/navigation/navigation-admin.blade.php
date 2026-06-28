<div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <x-nav-link-admin :active="Str::contains(request()->url(), 'list-user')">
            <a href="{{ route('listUser') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <span>User</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'home-category')">
            <a href="{{ route('homeCategory') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    <span>Kategori</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'block')">
            <a href="{{ route('blockIndex') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    <span>Blok</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'home-list')">
            <a href="{{ route('homeList') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>Rumah</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'list-booking')">
            <a href="{{ route('listBooking') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    <span>Booking</span>
                </div>
            </a>
        </x-nav-link-admin>
        <li class="menu {{ Str::contains(request()->url(), 'admin/faq') ? 'active' : '' }}">
            <a href="#submenuFaq" data-bs-toggle="collapse" aria-expanded="{{ Str::contains(request()->url(), 'admin/faq') ? 'true' : 'false' }}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    <span>FAQ</span>
                </div>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
            </a>
            <ul class="collapse submenu list-unstyled {{ Str::contains(request()->url(), 'admin/faq') ? 'show' : '' }}" id="submenuFaq">
                <li class="{{ request()->routeIs('faqIndex') || request()->routeIs('faqAdd') || request()->routeIs('faqEdit') ? 'active' : '' }}">
                    <a href="{{ route('faqIndex') }}" wire:navigate>List FAQ</a>
                </li>
                <li class="{{ request()->routeIs('faqCategoryIndex') || request()->routeIs('faqCategoryAdd') || request()->routeIs('faqCategoryEdit') ? 'active' : '' }}">
                    <a href="{{ route('faqCategoryIndex') }}" wire:navigate>Kategori FAQ</a>
                </li>
            </ul>
        </li>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'setting')">
            <a href="{{ route('setting') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span>Setting</span>
                </div>
            </a>
        </x-nav-link-admin>
        <li class="menu">
            <a href="javascript:void(0);" class="dropdown-toggle"
               onclick="document.getElementById('admin-logout-form').submit()">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span>Logout</span>
                </div>
            </a>
        </li>
    </ul>
    <form id="admin-logout-form" method="POST" action="{{ route('admin.logout') }}" style="display:none;">
        @csrf
    </form>
    </ul>

</div>
