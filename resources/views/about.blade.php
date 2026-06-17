@php
    $aboutSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Beranda',
                'item' => url('/'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Tentang Luma Daya',
                'item' => url('/about'),
            ],
        ],
    ];
@endphp

<x-layout.app title="Tentang Luma Daya | Smart Energy Solutions" description="Kenali Luma Daya, penyedia solusi PLTS untuk rumah, industri, hybrid, off-grid, on-grid, dan BESS di Indonesia." :canonical="url('/about')" :schema="$aboutSchema">
    <section class="relative overflow-hidden bg-stone-950 text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1800&q=85" alt="Solar panels under clear sky" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/82 via-black/45 to-black/20"></div>
            <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-stone-950 to-transparent"></div>
        </div>

        <div class="relative z-10 mx-auto flex min-h-[78vh] max-w-7xl items-end px-4 pb-16 pt-32 sm:px-6 lg:px-8">
            <div class="max-w-4xl" data-aos="fade-up">
                <p class="hero-kicker mb-5">
                    Tentang Luma Daya
                </p>
                <h1 class="text-5xl font-semibold leading-[0.96] tracking-normal sm:text-6xl lg:text-8xl">
                    Membangun energi bersih untuk kebutuhan sehari-hari.
                </h1>
                <p class="mt-8 max-w-2xl text-lg leading-8 text-white/76">
                    Luma Daya membantu rumah, bisnis, dan komunitas memakai sistem PLTS yang praktis untuk menekan biaya listrik dan mengurangi ketergantungan pada energi konvensional.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Cerita kami</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Keahlian PLTS dengan janji sederhana: membuat energi surya lebih mudah dipercaya.
                    </h2>
                </div>
                <div data-aos="fade-left" class="space-y-6 text-lg leading-8 text-stone-600">
                    <p>
                        Luma Daya hadir agar energi terbarukan terasa lebih sederhana dan berguna. Setiap proyek dimulai dari asesmen jelas, rekomendasi yang jujur, dan desain sistem sesuai kebutuhan listrik nyata.
                    </p>
                    <p>
                        Dari atap rumah sampai fasilitas bisnis, tim kami berfokus pada instalasi yang tahan lama, pemantauan transparan, dan layanan jangka panjang agar pelanggan dapat terus berhemat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F4FBF8] py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 max-w-3xl" data-aos="fade-up">
                <p class="section-eyebrow">Prinsip kerja</p>
                <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                    Dirancang untuk keandalan, kejelasan, dan dampak yang terukur.
                </h2>
            </div>

            <div class="grid gap-5 md:grid-cols-3">
                @foreach ([
                    ['Sistem andal', 'Kami memakai komponen efisien dan standar instalasi disiplin agar sistem tetap bekerja optimal.'],
                    ['Perencanaan transparan', 'Pelanggan memahami rekomendasi kapasitas, estimasi penghematan, dan kebutuhan operasional jangka panjang.'],
                    ['Dampak lebih bersih', 'Setiap instalasi membantu mengurangi emisi dan membuat biaya energi lebih mudah diprediksi.'],
                ] as $value)
                    <article data-aos="fade-up" class="rounded-[1.5rem] bg-white p-7 shadow-sm ring-1 ring-black/5">
                        <div class="mb-8 h-1.5 w-14 rounded-full bg-[#46B13F]"></div>
                        <h3 class="text-2xl font-bold text-stone-950">{{ $value[0] }}</h3>
                        <p class="mt-4 leading-7 text-stone-600">{{ $value[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="overflow-hidden bg-stone-950 py-20 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <div class="relative" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1559302504-64aae6ca6b6d?auto=format&fit=crop&w=1000&q=85" alt="Tim instalasi panel surya" class="h-[520px] w-full rounded-[2rem] object-cover">
                    <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 overflow-hidden rounded-[1.5rem] bg-stone-950 text-center">
                        @foreach ([['2.500+', 'Panel terpasang'], ['30%', 'Rata-rata hemat'], ['24/7', 'Pemantauan siap']] as $stat)
                            <div class="border-r border-white/10 p-4 last:border-r-0">
                                <div class="text-2xl font-bold">{{ $stat[0] }}</div>
                                <div class="mt-1 text-xs text-white/65">{{ $stat[1] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left">
                    <p class="section-eyebrow text-[#9DD6A6]">Cara kerja</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        Dari konsultasi sampai sistem aktif, setiap langkah dibuat jelas.
                    </h2>
                    <div class="mt-8 space-y-5">
                        @foreach ([
                            ['01', 'Survei lokasi dan pola pemakaian'],
                            ['02', 'Desain sistem PLTS sesuai kebutuhan'],
                            ['03', 'Instalasi, pengujian, dan serah terima'],
                        ] as $step)
                            <div class="flex items-center gap-5 rounded-[1.25rem] bg-stone-900 p-5 ring-1 ring-stone-800">
                                <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-[#0F4FB8] font-black text-white">{{ $step[0] }}</span>
                                <h3 class="text-xl font-bold">{{ $step[1] }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-[#F1FBF4] p-8 sm:p-12 lg:flex lg:items-center lg:justify-between">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Mulai dengan Luma Daya</p>
                    <h2 class="mt-4 max-w-3xl text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Siap melihat potensi energi surya untuk properti Anda?
                    </h2>
                </div>
                <a href="/#contact" data-aos="fade-left" class="mt-8 inline-flex items-center gap-3 rounded-full bg-[#0F4FB8] px-6 py-4 text-sm font-bold text-white transition hover:bg-[#0D3F93] lg:mt-0">
                    Hubungi kami
                </a>
            </div>
        </div>
    </section>
</x-layout.app>
