@php
    // Mapping warna berdasarkan status dari Database Anda ('dijual', 'terjual', 'sewa', 'tersewa')
    $colorClass = match(strtolower($unit->status)) {
        'terjual' => 'bg-red-600',       // Merah
        'tersewa' => 'bg-blue-600',      // Biru Tua
        'sewa'    => 'bg-green-500',     // Hijau
        'dijual'  => 'bg-white border-2 border-gray-400', // Putih (Tersedia)
        default   => 'bg-white border-2 border-gray-400'
    };
@endphp

<div class="absolute group cursor-pointer z-10 transition-transform duration-200 hover:scale-125"
     style="left: {{ $unit->x_coordinate }}%; top: {{ $unit->y_coordinate }}%; transform: translate(-50%, -50%);">
    
    <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 md:w-2.5 md:h-2.5 rounded-full shadow-sm border border-white {{ $colorClass }}"></div>
    
    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-max max-w-[150px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 pointer-events-none">
        <div class="bg-gray-900 text-white text-xs rounded-lg py-1.5 px-3 text-center shadow-xl">
            <span class="font-bold text-sm block mb-0.5">{{ $unit->name }}</span>
            @if($unit->unit_number)
                <span class="text-[10px] text-gray-300 block">Unit: {{ $unit->unit_number }}</span>
            @endif
            <span class="capitalize text-[10px] font-semibold block mt-1 py-0.5 px-2 rounded-full 
                {{ $unit->status === 'dijual' || $unit->status === 'sewa' ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                {{ $unit->status }}
            </span>
        </div>
        <div class="w-2 h-2 bg-gray-900 transform rotate-45 absolute -bottom-1 left-1/2 -translate-x-1/2"></div>
    </div>
</div>