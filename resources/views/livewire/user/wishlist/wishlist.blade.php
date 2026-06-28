<div class="">
    <!-- Header Started -->
    <section class="bg-primary-10">
    <div class="h-auto w-full bg-cover bg-center bg-no-repeat"
        style="background-image: url(&quot;/frontendNew/assets/images/layer.svg&quot;)">
        <div
            class="container flex h-[225px] flex-col items-center justify-center sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] 2xl:h-[450px]">
            <h1 class="common-hero-heading">Whislist</h1>
    
            <div class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white">
                        <i class="fa-solid fa-house me-2.5 h-3 w-3"></i>
                        Home
                    </a>
                </li>
    
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-1 h-3 w-3 text-gray-400"></i>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Properties</span>
                    </div>
                </li>
                </ol>
            </div>
        </div>
    </div>
    </section>
    <!-- Header Ended -->
        <section class="section-padding-120 container px-4 xl:px-0">
        <div class="gap-30 section-padding-t grid w-full sm:grid-cols-2 md:grid-cols-3">
            @forelse ($wishlists as $wishlist)
            <div class="h5-description-card">
                <div class="group relative h-auto w-full overflow-hidden rounded-t-[20px]">
                    <img src="{{ $wishlist->homeList->homeImage->count() ? asset('storage/images/detailHomeImages/' . $wishlist->homeList->homeImage->first()->image) : asset('blank.png') }}"
                        class="h-full max-h-[250px] w-full object-cover transition-all duration-700 ease-in-out group-hover:scale-[1.15]" />
                </div>
                <div class="h5-description-body !bg-new-100">
                    <a class="title" href="{{ route('detailProperti', $wishlist->homeList->slug) }}">{{ $wishlist->homeList->name }}</a>
                    <p>Lt {{ $wishlist->homeList->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $wishlist->homeList->building_area }}&nbsp;m<sup>2</sup></p>
                    <div class="h5-description-icons">
                    <div style="display: flex; justify-content: start; width: 100%;">
                        <span class="uppercase">{{ $wishlist->homeList->status }}</span>
                    </div>
                    </div>
        
                    <div class="h5-description-footer">
                    <span>
                        {{ $wishlist->homeList->getPriceAttribute() }}
                        @if ($wishlist->homeList->homeCategory->slug == 'sewa')
                            Juta / bulan
                        @else
                            Juta
                        @endif
                    </span>
                    <a href="{{ route('detailProperti', $wishlist->homeList->slug) }}">View Details
                        <i class="fa-solid fa-arrow-right-long text-secondary"></i></a>
                    </div>
                </div>
            </div>
            @empty
                <div class="text-center">Anda belum pernah booking</div >
            @endforelse
        </div>
    </section>
</div>