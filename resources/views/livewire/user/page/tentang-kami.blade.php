<div>
    <!-- Header -->
    <section class="bg-primary-10">
        <div class="h-auto w-full bg-cover bg-center bg-no-repeat"
            style="background-image: url('/frontendNew/assets/images/layer.svg')">
            <div class="container flex h-[225px] flex-col items-center justify-center sm:h-[250px] md:h-[300px]">
                <h1 class="common-hero-heading">Tentang Kami</h1>
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
                                <span class="ms-1 text-sm font-medium text-gray-500">Tentang Kami</span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Perusahaan -->
    <section class="section-padding container px-4 xl:px-0">
        <div class="grid gap-10 md:grid-cols-2 items-center">
            <!-- Logo & Nama -->
            <div data-aos="fade-right" class="flex flex-col items-center md:items-start gap-5">
                @if($setting && $setting->image_logo)
                    <img src="{{ asset('storage/images/settings/' . $setting->image_logo) }}"
                        alt="{{ $setting->company_name ?? 'Logo' }}"
                        class="w-40 h-auto object-contain" />
                @endif
                <h2 class="text-3xl font-bold text-gray-800">{{ $setting->company_name ?? 'Nama Perusahaan' }}</h2>
                @if($setting && $setting->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone) }}"
                        target="_blank"
                        class="flex items-center gap-2 text-green-600 font-semibold hover:underline">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        {{ $setting->phone }}
                    </a>
                @endif
            </div>

            <!-- Deskripsi -->
            <div data-aos="fade-left">
                @if($setting && $setting->desc)
                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        {!! $setting->desc !!}
                    </div>
                @else
                    <p class="text-gray-500">Deskripsi perusahaan belum tersedia.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="bg-primary py-12">
        <div class="container px-4 xl:px-0">
            <div class="grid grid-cols-2 gap-6 text-center text-white md:grid-cols-4">
                <div data-aos="zoom-in" data-aos-delay="0">
                    <p class="text-4xl font-bold">{{ $categories->count() }}+</p>
                    <p class="mt-1 text-sm font-medium opacity-80">Jenis Perumahan</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="100">
                    <p class="text-4xl font-bold">{{ $totalUnits }}+</p>
                    <p class="mt-1 text-sm font-medium opacity-80">Total Unit</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200">
                    <p class="text-4xl font-bold">100%</p>
                    <p class="mt-1 text-sm font-medium opacity-80">Legalitas Terjamin</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="300">
                    <p class="text-4xl font-bold">7/7</p>
                    <p class="mt-1 text-sm font-medium opacity-80">Hari Siap Melayani</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Perumahan -->
    <section class="section-padding container px-4 xl:px-0">
        <h2 data-aos="zoom-in-up" class="heading-2 mb-2 text-center">Perumahan Kami</h2>
        <p data-aos="zoom-in-up" data-aos-delay="100" class="heading-tagline mb-10 text-center">
            Berbagai pilihan perumahan berkualitas untuk memenuhi kebutuhan Anda
        </p>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($categories as $cat)
            <div data-aos="fade-up" class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
                @if($cat->image)
                    <img src="{{ asset('storage/images/categories/' . $cat->image) }}"
                        alt="{{ $cat->name }}"
                        class="mb-4 h-16 w-16 rounded-full object-cover" />
                @endif
                <h4 class="text-lg font-bold text-gray-800">{{ $cat->name }}</h4>
                @if($cat->address)
                    <p class="mt-1 text-sm text-gray-500 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-primary"></i> {{ $cat->address }}
                    </p>
                @endif
                <p class="mt-2 text-sm text-gray-500">{{ $cat->home_list_count }} unit tersedia</p>
                <a href="{{ route('kategoriDetail', $cat->slug) }}"
                    class="mt-3 inline-block rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white hover:bg-primary-400 transition">
                    Lihat Unit
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Keunggulan -->
    <section class="section-padding bg-primary-10 px-3 xl:px-0">
        <div class="container">
            <h2 data-aos="zoom-in-up" class="heading-2 mb-2 text-center">Visi & Keunggulan</h2>
            <p data-aos="zoom-in-up" data-aos-delay="100" class="heading-tagline mb-10 text-center">
                Kami berkomitmen menghadirkan hunian terbaik
            </p>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div data-aos="fade-up" data-aos-delay="0" class="rounded-2xl bg-white p-6 shadow-sm">
                    <i class="fa-solid fa-hand-holding-heart text-3xl text-primary mb-3"></i>
                    <h5 class="text-lg font-bold text-gray-800 mb-2">Berorientasi Pelanggan</h5>
                    <p class="text-sm text-gray-500">Kepuasan pelanggan adalah prioritas utama kami dari awal hingga serah terima kunci.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl bg-white p-6 shadow-sm">
                    <i class="fa-solid fa-building text-3xl text-primary mb-3"></i>
                    <h5 class="text-lg font-bold text-gray-800 mb-2">Kualitas Bangunan</h5>
                    <p class="text-sm text-gray-500">Menggunakan material pilihan dan standar konstruksi tinggi untuk hunian yang kokoh dan nyaman.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="rounded-2xl bg-white p-6 shadow-sm">
                    <i class="fa-solid fa-file-contract text-3xl text-primary mb-3"></i>
                    <h5 class="text-lg font-bold text-gray-800 mb-2">Proses Transparan</h5>
                    <p class="text-sm text-gray-500">Proses pembelian yang jelas, transparan, dan didukung dokumen legal yang lengkap.</p>
                </div>
            </div>
        </div>
    </section>
</div>
