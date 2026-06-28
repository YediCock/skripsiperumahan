<div>
    <section class="bg-primary-10">
        <div class="h-auto w-full bg-cover bg-center bg-no-repeat"
            style="background-image: url('/frontendNew/assets/images/layer.svg')">
            <div class="container flex h-[225px] flex-col items-center justify-center sm:h-[250px] md:h-[300px]">
                <h1 class="common-hero-heading">FAQ</h1>
                <p class="mt-2 text-gray-600 text-sm">Pertanyaan yang Sering Diajukan</p>
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
                                <span class="ms-1 text-sm font-medium text-gray-500">FAQ</span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding container px-4 xl:px-0 max-w-3xl mx-auto">

        @forelse($faqCategories as $cat)
        <div class="mb-10" data-aos="fade-up">
            <h3 class="mb-4 text-lg font-bold text-primary border-b border-primary pb-2">
                <i class="fa-solid fa-tag mr-2"></i>{{ $cat->name }}
            </h3>
            <div class="space-y-3">
                @foreach($cat->faqs as $faq)
                <div x-data="{ open: false }" class="rounded-xl border border-gray-200 bg-white overflow-hidden">
                    <button @click="open = !open"
                        class="flex w-full items-center justify-between px-5 py-4 text-left text-sm font-semibold text-gray-800 hover:bg-gray-50 transition">
                        <span>{{ $faq->pertanyaan }}</span>
                        <i class="fa-solid fa-chevron-down text-primary transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100">
                        <p class="pt-3">{{ $faq->jawaban }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <p class="text-center text-gray-400 py-20">Belum ada FAQ tersedia.</p>
        @endforelse

        <div data-aos="fade-up" class="mt-10 rounded-2xl bg-primary p-8 text-center text-white">
            <h4 class="text-xl font-bold mb-2">Masih ada pertanyaan?</h4>
            <p class="text-sm opacity-90 mb-5">Tim marketing kami siap membantu Anda setiap hari.</p>
            @php $waSet = \App\Models\Setting::first(); @endphp
            @if($waSet && $waSet->phone)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $waSet->phone) }}"
                target="_blank"
                class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-primary hover:bg-gray-100 transition">
                <i class="fa-brands fa-whatsapp text-green-500 text-xl"></i>
                Hubungi via WhatsApp
            </a>
            @endif
        </div>
    </section>
</div>
