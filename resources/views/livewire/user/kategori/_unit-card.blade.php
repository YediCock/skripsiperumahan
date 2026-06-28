<div class="rounded-xl bg-white border border-gray-100 shadow-sm overflow-hidden transition hover:shadow-md">
    <div class="relative">
        <div class="absolute right-0 top-0 z-10 rounded-bl-xl
            @if($unit->status === 'dijual') bg-primary
            @elseif($unit->status === 'terjual') bg-red-500
            @elseif($unit->status === 'sewa') bg-blue-500
            @else bg-orange-400 @endif
            px-2.5 py-1 text-xs font-semibold text-white uppercase">
            {{ $unit->status }}
        </div>
        @if($unit->unit_number)
        <div class="absolute left-0 top-0 z-10 bg-secondary px-2.5 py-1 text-xs font-bold text-white">
            {{ $unit->unit_number }}
        </div>
        @endif
        <img src="{{ $unit->homeImage->count() ? asset('storage/images/detailHomeImages/' . $unit->homeImage->first()->image) : asset('blank.png') }}"
            alt="{{ $unit->name }}"
            class="w-full h-40 object-cover" />
    </div>
    <div class="p-4">
        <p class="text-lg font-bold text-primary">{{ $unit->getPriceAttribute() }}
            <span class="text-xs font-normal text-gray-500">Juta{{ $unit->homeCategory->slug === 'sewa' ? ' /bln' : '' }}</span>
        </p>
        <h5 class="mt-1 mb-2 text-sm font-semibold text-gray-800 line-clamp-1">{{ $unit->name }}</h5>
        <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
            <span><i class="fa-solid fa-bed text-primary mr-0.5"></i> {{ $unit->number_of_bedrooms }} KT</span>
            <span><i class="fa-solid fa-bath text-primary mr-0.5"></i> {{ $unit->number_of_bathrooms }} KM</span>
            <span><i class="fa-solid fa-expand text-primary mr-0.5"></i> {{ $unit->land_area }}/{{ $unit->building_area }} m²</span>
        </div>
        <a href="{{ route('detailProperti', $unit->slug) }}"
            class="block w-full rounded-lg bg-primary py-2 text-center text-xs font-semibold text-white hover:bg-primary-400 transition">
            Lihat Detail
        </a>
    </div>
</div>
