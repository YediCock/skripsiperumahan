<div class="">
<!-- Hero section start -->
<div class="w-full overflow-hidden px-3 pb-6 md:pb-8 lg:pb-12 xl:pb-16 2xl:px-0">
    <section class="w-full">
        <img 
            src="https://faniindrasaputra.my.id/storage/images/sliders/IYkeSLGcYRnvJ5eSC58i.webp" 
            alt="Hero Image" 
            class="w-full h-auto object-cover"
        />
    </section>
    </div>
<!-- Hero section end -->

<!-- Banner Promosi section start -->
@if($setting && $setting->image_promotion)
<section class="w-full px-3 py-6 md:py-8 xl:px-0">
    <div class="container mx-auto"> <img src="{{ asset('storage/images/settings/' . $setting->image_promotion) }}"
            alt="Promosi Perumahan"
            class="w-full h-auto rounded-2xl shadow-md" />
    </div>
</section>
@endif
<!-- Banner Promosi section end -->

<!-- Best place section start -->
<section class="section-padding bg-white px-3 xl:px-0">
    <div class="container flex flex-col items-center justify-center">
        <h2 data-aos="zoom-in-up" class="heading-2">
            Pilih Perumahan Anda
        </h2>
        <p data-aos="zoom-in-up" data-aos-delay="150"
            class="heading-tagline mb-6 mt-3.5 md:mb-8 lg:mb-10 lg:mt-5 xl:mb-12">
            Temukan perumahan terbaik sesuai kebutuhan Anda.<br />
            Klik untuk melihat detail, blok, dan unit yang tersedia.
        </p>

        <div class="grid w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 divide-y divide-gray-100 lg:divide-x-2 lg:divide-y-2">
            @forelse ($categories as $category)
                <div data-aos-delay="100" data-aos="fade-in" data-aos-easing="ease-in-out" class="best-place-card group !border-t-0">
                    <a href="{{ route('kategoriDetail', $category->slug) }}" class="font-semibold hover:text-primary">{{ $category->name }}</a>
                    @if($category->address)
                    <p class="chip mt-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span class="truncate max-w-[160px]">{{ $category->address }}</span>
                    </p>
                    @endif
                    <p class="chip mt-1">
                        <i class="fa-solid fa-house"></i>
                        <span>{{ $category->homeList->count() }} Unit</span>
                    </p>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Belum ada kategori.</p>
            @endforelse
        </div>
    </div>
</section>
<!-- Best place section end -->

<!-- Mengapa Pilih Kami section start -->
<section class="section-padding bg-primary-10 px-3 xl:px-0">
    <div class="container flex flex-col items-center justify-center">
        <h2 data-aos="zoom-in-up" class="heading-2">Mengapa Pilih Kami?</h2>
        <p data-aos="zoom-in-up" data-aos-delay="100" class="heading-tagline mb-10 mt-3">
            Kami hadir untuk memberikan hunian terbaik dengan proses mudah dan terpercaya.
        </p>
        <div class="grid w-full gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div data-aos="fade-up" data-aos-delay="0" class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm">
                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white text-2xl">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h5 class="mb-2 text-lg font-bold text-gray-800">Terpercaya & Legal</h5>
                <p class="text-sm text-gray-500">Semua properti telah memiliki sertifikat resmi dan legalitas yang terjamin.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm">
                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white text-2xl">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <h5 class="mb-2 text-lg font-bold text-gray-800">Harga Terjangkau</h5>
                <p class="text-sm text-gray-500">Dapatkan hunian berkualitas dengan harga yang kompetitif dan cicilan ringan.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm">
                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white text-2xl">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h5 class="mb-2 text-lg font-bold text-gray-800">Lokasi Strategis</h5>
                <p class="text-sm text-gray-500">Dekat dengan fasilitas umum, sekolah, pasar, dan akses jalan utama.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col items-center rounded-2xl bg-white p-6 text-center shadow-sm">
                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white text-2xl">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h5 class="mb-2 text-lg font-bold text-gray-800">Layanan Terbaik</h5>
                <p class="text-sm text-gray-500">Tim kami siap membantu Anda 7 hari seminggu dari proses awal hingga serah terima kunci.</p>
            </div>
        </div>
    </div>
</section>
<!-- Mengapa Pilih Kami section end -->

<!-- How it works section start -->
<section class="section-padding overflow-hidden">
    <div class="container flex flex-col items-center justify-center">
        <h2 data-aos="zoom-in-up" class="heading-2 mb-5">Cara Kerjanya</h2>
        <p data-aos="zoom-in-up" data-aos-delay="150" class="heading-tagline">
            Proses mudah dan cepat untuk mendapatkan properti impian Anda.
        </p>
        <div class="mt-14 flex w-full flex-col items-center gap-0 gap-y-5 px-3 md:flex-row md:gap-y-0 2xl:px-0">
            <!-- card 1 -->
            <div data-aos="zoom-in-right"
            class="how-it-works-card group duration-200 ease-in-out hover:shadow-shadow6 hover:transition-all">
            <div class="how-it-works__rounded-1"></div>
            <div class="how-it-works__rounded-2"></div>
            <div
                class="how-it-works_img-container text-primary hover:transition-all hover:duration-200 hover:ease-in-out group-hover:text-secondary">
                <svg width="40" height="36" viewBox="0 0 40 36" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M39.6508 16.5394L34.0935 11.6955V3.23989C34.0935 2.98495 33.8712 2.73001 33.56 2.73001H28.8473C28.5806 2.73001 28.3138 2.94246 28.3138 3.23989V6.68162L21.2893 0.478017C20.5335 -0.159339 19.422 -0.159339 18.6662 0.478017L0.349162 16.5394C-0.36218 17.1343 0.0824085 18.2815 1.0605 18.2815H3.81696L20 3.83476L36.183 18.2815H38.9395C39.9176 18.2815 40.3622 17.1767 39.6508 16.5394Z"
                        fill="currentColor" />
                    <path
                        d="M34.3158 32.0909H34.049C34.049 32.0484 34.049 32.0059 34.049 31.9209V18.409L20 5.8743L5.90652 18.409V31.9209C5.90652 31.9634 5.90652 32.0484 5.90652 32.0909H5.37302C5.01735 32.0909 4.70613 32.3883 4.70613 32.7282V35.3626C4.70613 35.7026 5.01735 36 5.37302 36H34.2713C34.627 36 34.9382 35.7026 34.9382 35.3626V32.7282C34.9827 32.3883 34.7159 32.0909 34.3158 32.0909ZM28.7139 21.2133L26.8022 19.8961L19.1997 29.4565L14.9761 26.5671L10.2635 32.2184L8.30731 30.7312L14.4871 23.2529L18.6662 26.1422L24.7571 18.494L22.8898 17.1768L28.6695 15.4346V21.2133H28.7139Z"
                        fill="currentColor" />
                </svg>
            </div>
            <div class="content">
                <h4>Temukan Properti</h4>
                <p>Pilih perumahan yang sesuai dengan kebutuhan dan anggaran Anda.</p>
            </div>
            </div>
            <!-- line -->
            <div class="h-[3px] w-full flex-1 bg-primary"></div>
            <!-- card 2 -->
            <div data-aos="zoom-in"
            class="how-it-works-card group duration-200 ease-in-out hover:shadow-shadow6 hover:transition-all">
            <div class="how-it-works__rounded-1"></div>
            <div class="how-it-works__rounded-2"></div>
            <div
                class="how-it-works_img-container text-primary hover:transition-all hover:duration-200 hover:ease-in-out group-hover:text-secondary">
                <svg width="40" height="38" viewBox="0 0 40 38" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M39.3282 16.8827L21.3815 0.538121C20.5938 -0.1794 19.4059 -0.179322 18.6185 0.538043L0.67172 16.8828C0.0407064 17.4575 -0.16773 18.3429 0.14055 19.1385C0.448908 19.9341 1.19969 20.4482 2.05336 20.4482H4.91975V36.8242C4.91975 37.4735 5.44647 37.9999 6.09608 37.9999H15.9331C16.5827 37.9999 17.1094 37.4736 17.1094 36.8242V26.8812H22.8908V36.8243C22.8908 37.4736 23.4175 38 24.0671 38H33.9036C34.5532 38 35.08 37.4736 35.08 36.8243V20.4482H37.9469C38.8005 20.4482 39.5514 19.9341 39.8597 19.1385C40.1676 18.3429 39.9592 17.4575 39.3282 16.8827Z"
                        fill="currentColor" />
                    <path
                        d="M34.7727 2.34679H26.8728L35.949 10.5954V3.52244C35.949 2.87316 35.4224 2.34679 34.7727 2.34679Z"
                        fill="currentColor" />
                </svg>
            </div>
            <div class="content">
                <h4>Pilih Unit</h4>
                <p>Pilih blok dan nomor unit yang Anda inginkan dari ketersediaan yang ada.</p>
            </div>
            </div>
            <!-- line -->
            <div class="h-[3px] w-full flex-1 bg-primary"></div>
            <!-- card 3 -->
            <div data-aos="zoom-in-left"
            class="how-it-works-card group duration-200 ease-in-out hover:shadow-shadow6 hover:transition-all">
            <div class="how-it-works__rounded-1"></div>
            <div class="how-it-works__rounded-2"></div>
            <div
                class="how-it-works_img-container text-primary hover:transition-all hover:duration-200 hover:ease-in-out group-hover:text-secondary">
                <svg width="40" height="36" viewBox="0 0 40 36" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M34.0935 11.6955L39.6508 16.5394C40.3622 17.1767 39.9176 18.2815 38.9395 18.2815H36.183L20 3.83476L3.81696 18.2815H1.0605C0.0824085 18.2815 -0.36218 17.1343 0.349162 16.5394L18.6662 0.478017C19.422 -0.159339 20.5335 -0.159339 21.2893 0.478017L28.3138 6.68162V3.23989C28.3138 2.94246 28.5806 2.73001 28.8473 2.73001H33.56C33.8712 2.73001 34.0935 2.98495 34.0935 3.23989V11.6955Z"
                        fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M34.049 32.0909H34.3158C34.7159 32.0909 34.9827 32.3883 34.9382 32.7282V35.3626C34.9382 35.7026 34.627 36 34.2713 36H5.37302C5.01735 36 4.70613 35.7026 4.70613 35.3626V32.7282C4.70613 32.3883 5.01735 32.0909 5.37302 32.0909H5.90652V18.409L20 5.8743L34.049 18.409V32.0909ZM24 21C24 23.2091 22.2091 25 20 25C17.7909 25 16 23.2091 16 21C16 18.7909 17.7909 17 20 17C22.2091 17 24 18.7909 24 21ZM12 28C12 27.4477 12.4477 27 13 27H16.9458C17.2905 27 17.611 27.1776 17.7938 27.47L19.152 29.6432C19.5437 30.2699 20.4563 30.2699 20.848 29.6432L22.2062 27.47C22.389 27.1776 22.7095 27 23.0542 27H27C27.5523 27 28 27.4477 28 28V33H12V28Z"
                        fill="currentColor" />
                </svg>
            </div>
            <div class="content">
                <h4>Booking & Miliki</h4>
                <p>Lakukan booking online dan kami akan menghubungi Anda untuk proses selanjutnya.</p>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- How it works section end -->

<!-- Feature Destination section started -->
<section class="bg-white pb-10 pt-6 md:pb-16 md:pt-8 lg:pb-20 lg:pt-12 xl:pb-24 xl:pt-16 2xl:pb-28">
    <div class="container flex flex-col items-center justify-center px-3 2xl:px-0">
        <div class="space-y-2 md:space-y-3 lg:space-y-5">
            <h2 data-aos="zoom-in-up" class="heading-2">
            Rekomendasi Properti
            </h2>
            <p data-aos="zoom-in-up" data-aos-delay="150" class="heading-tagline">
            Pilihan properti terbaru untuk anda
            </p>
        </div>

        <div class="mt-8 grid gap-4 *:max-w-[410px] md:mt-10 md:gap-7 lg:mt-12 lg:grid-cols-3 xl:mt-16 2xl:mt-20">
            @foreach ($CategorySelainSewa as $homeList)
                <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="rounded-[20px] bg-new-100 transition-all duration-300 ease-in-out hover:shadow-shadow7">
                    <div class="group relative h-auto w-full overflow-hidden rounded-t-[20px]">
                        <div class="absolute right-0 top-0 z-10 rounded-tr-[20px] bg-primary px-3.5 py-1.5 font-semibold text-white uppercase">
                            {{ $homeList->status }}
                        </div>
                        @if($homeList->block && $homeList->unit_number)
                        <div class="absolute left-0 top-0 z-10 rounded-tl-[20px] bg-secondary px-3 py-1 text-xs font-semibold text-white">
                            {{ $homeList->block->name }} - {{ $homeList->unit_number }}
                        </div>
                        @endif
                        <img src="{{ $homeList->homeImage->count() ? asset('storage/images/detailHomeImages/' . $homeList->homeImage->first()->image) : asset('blank.png') }}"
                            class="h-full max-h-[250px] w-full object-cover transition-all duration-700 ease-in-out group-hover:scale-[1.15]" />
                    </div>
                    <div class="p-6">
                        <p class="text-2xl font-medium text-new-900">
                            {{ $homeList->getPriceAttribute() }}<span class="font-poppins text-sm font-medium text-new-800">
                                @if ($homeList->homeCategory->slug == 'sewa') Juta / bulan @else Juta @endif
                            </span>
                        </p>
                        <h4 class="mb-3 mt-2 text-xl font-medium leading-7 text-new-900">{{ $homeList->name }}</h4>
                        <p class="mb-3 text-xs text-gray-500 font-medium">{{ $homeList->homeCategory->name }}
                            @if($homeList->homeCategory->address)
                                &bull; {{ $homeList->homeCategory->address }}
                            @endif
                        </p>
                        <div class="flex items-center gap-x-4 text-sm text-new-800 mb-4">
                            <span><i class="fa-solid fa-bed text-primary mr-1"></i>{{ $homeList->number_of_bedrooms }} KT</span>
                            <span><i class="fa-solid fa-bath text-primary mr-1"></i>{{ $homeList->number_of_bathrooms }} KM</span>
                            <span><i class="fa-solid fa-expand text-primary mr-1"></i>{{ $homeList->land_area }}/{{ $homeList->building_area }} m²</span>
                        </div>
                        <hr />
                        <div class="mt-4 flex items-center justify-end">
                            <a href="{{ route('detailProperti', $homeList->slug) }}"
                            class="flex items-center gap-x-1.5 transition-all duration-300 ease-in-out hover:gap-x-4">
                            <span class="font-poppins text-sm font-medium text-new-900">Lihat Detail</span>
                            <i class="fa-solid fa-arrow-right text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Feature Destination section end -->
</div>
