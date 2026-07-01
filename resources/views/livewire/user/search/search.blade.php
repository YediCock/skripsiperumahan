<div>
    <!-- Header Started -->
    <section class="bg-primary-10">
    <div class="h-auto w-full bg-cover bg-center bg-no-repeat"
        style="background-image: url(&quot;/frontendNew/assets/images/layer.svg&quot;)">
        <div
            class="container flex h-[225px] flex-col items-center justify-center sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] 2xl:h-[450px]">
            <h1 class="common-hero-heading">Properties</h1>
    
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
    
    <!-- Content Started -->
    <section class="section-padding-120 container px-4 xl:px-0">
    <div class="gap-30 mb-30 flex flex-col items-center justify-between sm:flex-row">
        <div class="flex w-full items-center rounded-full border border-new-200 px-4 sm:w-1/2 md:w-1/4 lg:w-[190px]">
            <i class="fa-solid fa-mountain-city text-[#777777]"></i>
            <select wire:model.change="sortingBy" class="block w-full rounded-lg border-0 bg-white p-2.5 text-sm text-gray-900 !shadow-none focus:border-0 focus:ring-0">
                <option value="default">Filter Harga</option>
                <option value="low-high">Terendah ke tertinggi</option>
                <option value="high-low">Tertinggi ke terendah</option>
            </select>
        </div>
    
        <div class="flex w-full items-center rounded-full border border-new-200 px-4 sm:w-1/2 md:w-1/4 lg:w-[300px]">
            <i class="fa-solid fa-layer-group text-[#777777]"></i>
            @php $currentSlug = request()->segment(2); @endphp
            <select onchange="if (this.value) window.location.href=this.value"
                class="block w-full rounded-lg border-0 bg-white p-2.5 text-sm text-gray-900 !shadow-none focus:border-0 focus:ring-0">
                <option value="{{ route('search') }}" {{ $currentSlug == null ? 'selected' : '' }}>Semua Jenis</option>
                @foreach ($categories as $ctg)
                    <option value="{{ route('search', $ctg->slug) }}" {{ $currentSlug == $ctg->slug ? 'selected' : '' }}>
                        {{ $ctg->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @if(count($availableBlocks) > 0)
        <div class="flex w-full items-center rounded-full border border-new-200 px-4 sm:w-1/2 md:w-1/4 lg:w-[220px]">
            <i class="fa-solid fa-grid-2 text-[#777777]"></i>
            <select wire:model.live="filterBlock"
                class="block w-full rounded-lg border-0 bg-white p-2.5 text-sm text-gray-900 !shadow-none focus:border-0 focus:ring-0">
                <option value="">Semua Blok</option>
                @foreach($availableBlocks as $blok)
                    <option value="{{ $blok['id'] }}">{{ $blok['name'] }} ({{ $blok['unit_count'] }} unit)</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>

    {{-- Ringkasan blok --}}
    @if(count($availableBlocks) > 0)
    <div class="mt-3 flex flex-wrap gap-2 px-1">
        @foreach($availableBlocks as $blok)
        <button wire:click="$set('filterBlock', '{{ $filterBlock == $blok['id'] ? '' : $blok['id'] }}')"
            class="flex items-center gap-1.5 rounded-full border px-3 py-1 text-xs font-semibold transition
                {{ $filterBlock == $blok['id']
                    ? 'bg-primary text-white border-primary'
                    : 'bg-white text-gray-600 border-gray-200 hover:border-primary hover:text-primary' }}">
            <i class="fa-solid fa-layer-group text-[10px]"></i>
            {{ $blok['name'] }}
            <span class="rounded-full {{ $filterBlock == $blok['id'] ? 'bg-white/20' : 'bg-gray-100' }} px-1.5 py-0.5">
                {{ $blok['unit_count'] }}
            </span>
        </button>
        @endforeach
        @if($filterBlock)
        <button wire:click="$set('filterBlock', '')"
            class="flex items-center gap-1 rounded-full border border-gray-200 bg-gray-50 px-3 py-1 text-xs text-gray-500 hover:bg-gray-100 transition">
            <i class="fa-solid fa-xmark"></i> Reset
        </button>
        @endif
    </div>
    @endif

    <div wire:ignore class="mt-2 flex w-full items-center rounded-full border border-new-200 px-4">
        <i class="fa-solid fa-magnifying-glass text-[#777777]"></i>
        <input wire:model.live.debounce.300ms="search" class="block w-full rounded-lg border-0 bg-white p-2.5 text-sm text-gray-900 !shadow-none focus:border-0 focus:ring-0"
            placeholder="Cari Properti.." />
    </div>
    
    <div class="gap-30 section-padding-t grid w-full sm:grid-cols-2 md:grid-cols-3">
        @forelse ($latestHomes as $home)
        <div class="h5-description-card">
            <div class="h5-description-img relative">
                <img src="{{ $home->homeImage->count() ? asset('storage/images/detailHomeImages/' . $home->homeImage->first()->image) : asset('blank.png') }}" alt="{{ $home->name }}" />
                @if($home->block && $home->unit_number)
                <span class="absolute top-2 left-2 bg-secondary text-white text-xs font-semibold px-2 py-0.5 rounded">
                    {{ $home->block->name }} - {{ $home->unit_number }}
                </span>
                @endif
            </div>
            <div class="h5-description-body !bg-new-100">
                <a class="title" href="{{ url('search/detail/'.$home->slug) }}">{{ $home->name }}</a>
                <p class="text-xs text-gray-500">{{ $home->homeCategory->name }}@if($home->homeCategory->address) &bull; {{ $home->homeCategory->address }}@endif</p>
                <div class="flex items-center gap-3 text-xs text-gray-600 mt-1 mb-1">
                    <span><i class="fa-solid fa-bed text-primary mr-0.5"></i> {{ $home->number_of_bedrooms }} KT</span>
                    <span><i class="fa-solid fa-bath text-primary mr-0.5"></i> {{ $home->number_of_bathrooms }} KM</span>
                    <span><i class="fa-solid fa-expand text-primary mr-0.5"></i> {{ $home->land_area }}/{{ $home->building_area }} m²</span>
                </div>
                <div class="h5-description-icons">
                    <div style="display: flex; justify-content: start; width: 100%;">
                        <span class="uppercase">{{ $home->status }}</span>
                    </div>
                </div>
                <div class="h5-description-footer">
                    <span>
                        {{ $home->getPriceAttribute() }}
                        @if ($home->homeCategory->slug == 'sewa') Juta / bulan @else Juta @endif
                    </span>
                    <a href="{{ url('search/detail/'.$home->slug) }}">Lihat Detail
                        <i class="fa-solid fa-arrow-right-long text-secondary"></i></a>
                </div>
            </div>
        </div>
        @empty
            No home found!
        @endforelse
    </div>
    @if ($latestHomes->count() < $totalHomesCount)
        <div x-intersect="$wire.loadMore()" class="border-4 h-60 my-5 flex items-center justify-center py-3">
            <span class="text-center">Mengambil data selanjutnya..</span>
        </div>
    @endif
    </section>
    <!-- Content Ended -->
</div>