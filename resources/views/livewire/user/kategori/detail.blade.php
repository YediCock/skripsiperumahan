<div>
    <!-- Header -->
    <section class="bg-primary-10">
        <div class="h-auto w-full bg-cover bg-center bg-no-repeat"
            style="background-image: url('/frontendNew/assets/images/layer.svg')">
            <div class="container flex h-[225px] flex-col items-center justify-center sm:h-[250px] md:h-[300px]">
                <h1 class="common-hero-heading">{{ $category->name }}</h1>
                @if($category->address)
                    <p class="mt-2 text-gray-600 text-sm flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-primary"></i> {{ $category->address }}
                    </p>
                @endif
                <div class="mt-3 flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary">
                                <i class="fa-solid fa-house me-2"></i>Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fa-solid fa-chevron-right mx-1 h-3 w-3 text-gray-400"></i>
                                <span class="ms-1 text-sm font-medium text-gray-500">{{ $category->name }}</span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="container px-4 py-10 xl:px-0">

        <!-- Brosur & Site Plan -->
        @if($category->brochure_image || $category->site_plan_image)
        <section class="mb-12">
            <h2 class="heading-2 mb-6 text-center">Informasi Perumahan</h2>
            <div class="grid gap-6 {{ $category->brochure_image && $category->site_plan_image ? 'md:grid-cols-2' : 'md:grid-cols-1' }}">
                @if($category->brochure_image)
                <div class="rounded-2xl border bg-white p-4 shadow-sm">
                    <h4 class="mb-3 text-lg font-semibold text-gray-700">Brosur Perumahan</h4>
                    <a href="{{ asset('storage/images/categories/' . $category->brochure_image) }}" target="_blank">
                        <img src="{{ asset('storage/images/categories/' . $category->brochure_image) }}"
                            alt="Brosur {{ $category->name }}"
                            class="w-full rounded-xl object-contain max-h-[500px] cursor-pointer hover:opacity-90 transition" />
                    </a>
                    <p class="mt-2 text-xs text-gray-400 text-center">Klik gambar untuk memperbesar</p>
                </div>
                @endif
                @if($category->site_plan_image)
                <div class="rounded-2xl border bg-white p-4 shadow-sm">
                    <h4 class="mb-3 text-lg font-semibold text-gray-700">Site Plan / Denah Kawasan</h4>
                    <a href="{{ asset('storage/images/categories/' . $category->site_plan_image) }}" target="_blank">
                        <img src="{{ asset('storage/images/categories/' . $category->site_plan_image) }}"
                            alt="Site Plan {{ $category->name }}"
                            class="w-full rounded-xl object-contain max-h-[500px] cursor-pointer hover:opacity-90 transition" />
                    </a>
                    <p class="mt-2 text-xs text-gray-400 text-center">Klik gambar untuk memperbesar</p>
                </div>
                @endif
            </div>
        </section>
        @endif

        <!-- Unit per Blok -->
        <section>
            <h2 class="heading-2 mb-2 text-center">Unit Tersedia</h2>
            <p class="heading-tagline mb-8 text-center">Pilih unit sesuai kebutuhan Anda</p>

            @if($blocks->count() > 0)
                @foreach($blocks as $block)
                    @if($block->homeList->count() > 0)
                    <div class="mb-10">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary text-white font-bold text-sm">
                                {{ strtoupper(substr($block->name, -1)) }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $block->name }}</h3>
                            <span class="rounded-full bg-primary-10 px-3 py-1 text-xs font-medium text-primary">
                                {{ $block->homeList->count() }} unit
                            </span>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @foreach($block->homeList as $unit)
                                @include('livewire.user.kategori._unit-card', ['unit' => $unit])
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif

            @if($unitsWithoutBlock->count() > 0)
                <div class="mb-10">
                    <div class="mb-4 flex items-center gap-3">
                        <h3 class="text-xl font-bold text-gray-800">Unit Lainnya</h3>
                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                            {{ $unitsWithoutBlock->count() }} unit
                        </span>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach($unitsWithoutBlock as $unit)
                            @include('livewire.user.kategori._unit-card', ['unit' => $unit])
                        @endforeach
                    </div>
                </div>
            @endif

            @if($blocks->count() === 0 && $unitsWithoutBlock->count() === 0)
                <div class="py-20 text-center text-gray-400">
                    <i class="fa-solid fa-house-circle-xmark text-5xl mb-4"></i>
                    <p>Belum ada unit tersedia untuk perumahan ini.</p>
                </div>
            @endif
        </section>
    </div>
</div>
