@php
    $homeSchema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'WebSite',
                '@id' => url('/') . '#website',
                'name' => 'KIASOLAR',
                'url' => url('/'),
                'inLanguage' => 'id-ID',
                'description' => 'Solusi PLTS untuk solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS di Indonesia.',
            ],
            [
                '@type' => 'ItemList',
                '@id' => url('/') . '#layanan',
                'name' => 'Layanan KIASOLAR',
                'itemListElement' => collect(config('kiasolar.solutions'))->values()->map(fn ($item, $index) => [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'description' => $item['description'],
                ])->all(),
            ],
        ],
    ];
@endphp

<x-layout.app :schema="$homeSchema">
    <section id="hero" class="relative min-h-screen overflow-hidden bg-stone-950 text-white">
        <div class="hero-slider absolute inset-0">
            @php
                $slides = [
                    [
                        'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1900&q=88',
                        'title' => 'Energi surya untuk rumah dan bisnis',
                        'alt' => 'Deretan panel surya di bawah langit cerah',
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1559302504-64aae6ca6b6d?auto=format&fit=crop&w=1900&q=88',
                        'title' => 'PLTS rapi, aman, dan terukur',
                        'alt' => 'Instalasi panel surya pada bangunan modern',
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=1900&q=88',
                        'title' => 'BESS dan hybrid untuk daya cadangan',
                        'alt' => 'Sistem kelistrikan dan penyimpanan energi',
                    ],
                ];
            @endphp

            @foreach ($slides as $index => $slide)
                <div class="hero-slide absolute inset-0 {{ $index === 0 ? 'is-active' : '' }}" data-title="{{ $slide['title'] }}">
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/82 via-black/48 to-black/10"></div>
                    <div class="absolute inset-x-0 bottom-0 h-52 bg-gradient-to-t from-black/72 to-transparent"></div>
                </div>
            @endforeach
        </div>

        <div class="relative z-10 mx-auto flex min-h-screen max-w-7xl items-center px-4 pb-28 pt-28 sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="max-w-2xl pt-12">
                    <h1 class="hero-title max-w-[660px] text-4xl font-semibold leading-[1.02] tracking-normal text-white sm:text-5xl lg:text-[64px]">
                        Energi surya untuk rumah dan bisnis
                    </h1>
                    <p class="mt-6 max-w-lg text-base leading-7 text-white/76 sm:text-lg">
                        KIASOLAR membantu perencanaan solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS dengan desain yang jelas sejak awal.
                    </p>
                    <div data-aos="fade-up" data-aos-delay="160" class="mt-9">
                        <a href="#contact" class="group inline-flex items-center gap-6 rounded-full bg-[#12268C] px-7 py-4 text-base font-bold text-white transition hover:bg-white hover:text-[#12268C]">
                            Konsultasi gratis
                            <svg class="h-5 w-5 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 12H19M13 6L19 12L13 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="280" class="mt-24 flex flex-wrap items-center gap-5">
                        <div class="flex -space-x-4">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=120&q=80" alt="Pelanggan KIASOLAR" class="h-14 w-14 rounded-full border-2 border-white object-cover">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=120&q=80" alt="Pelanggan KIASOLAR" class="h-14 w-14 rounded-full border-2 border-white object-cover">
                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=120&q=80" alt="Pelanggan KIASOLAR" class="h-14 w-14 rounded-full border-2 border-white object-cover">
                        </div>
                        <p class="text-base font-semibold text-white">
                            <svg class="mr-2 inline h-5 w-5 text-[#12268C]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 1.7L12.4 7L18 7.6L13.8 11.5L15 17.1L10 14.2L5 17.1L6.2 11.5L2 7.6L7.6 7L10 1.7Z" />
                            </svg>
                            5.0 dari 500+ ulasan pelanggan
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-x-0 bottom-7 z-20 flex justify-center px-4">
            <div class="hero- flex items-center gap-2 rounded-full bg-white p-2 shadow-2xl">
                <button type="button" class="hero-nav-button" data-hero-prev aria-label="Slide sebelumnya">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                @foreach ($slides as $index => $slide)
                    <button type="button" class="hero-dot {{ $index === 0 ? 'is-active' : '' }}" data-hero-slide-button="{{ $index }}" aria-label="Tampilkan slide {{ $index + 1 }}"></button>
                @endforeach
                <button type="button" class="hero-nav-button" data-hero-next aria-label="Slide berikutnya">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <section id="about" class="overflow-hidden bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Tentang kami</p>
                    <h2 class="mt-4 max-w-xl text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Membantu lebih banyak orang beralih ke energi surya dengan percaya diri.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-stone-600">
                        Kami merancang sistem PLTS yang sesuai kebutuhan listrik, kondisi lokasi, dan target penghematan. Fokus kami sederhana: sistem aman, mudah dipantau, dan siap dipakai jangka panjang.
                    </p>
                    <a href="/about" class="mt-8 inline-flex items-center gap-3 rounded-full border border-stone-300 px-5 py-3 text-sm font-bold text-stone-950 transition hover:border-[#12268C] hover:bg-[#EEF1FF]">
                        Kenali KIASOLAR
                    </a>
                </div>

                <div class="relative grid grid-cols-2 gap-4 sm:gap-5" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1497440001374-f26997328c1b?auto=format&fit=crop&w=700&q=85" alt="Aerial wind turbine landscape" class="parallax-image h-64 w-full rounded-[1.5rem] object-cover sm:h-80">
                    <img src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=700&q=85" alt="Solar panels in a field" class="parallax-image mt-10 h-64 w-full rounded-[1.5rem] object-cover sm:h-80">
                    <div class="absolute -bottom-6 left-6 grid grid-cols-2 overflow-hidden rounded-[1.25rem] bg-stone-950 text-white shadow-2xl">
                        <div class="border-r border-white/10 p-5">
                            <div class="text-4xl font-bold"><span class="counter" data-target="18">0</span>+</div>
                            <div class="mt-1 text-xs text-white/60">Pengalaman tim</div>
                        </div>
                        <div class="p-5">
                            <div class="text-4xl font-bold"><span class="counter" data-target="99">0</span>%</div>
                            <div class="mt-1 text-xs text-white/60">Kepuasan pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kalkulator-solar" class="bg-stone-100 py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 max-w-3xl" data-aos="fade-up">
                <p class="section-eyebrow">Kalkulator solar</p>
                <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                    Simulasi cepat kebutuhan sistem PLTS Anda.
                </h2>
                <p class="mt-5 text-lg leading-8 text-stone-600">
                    Perhitungan ini memakai rumus umum untuk estimasi awal. Hasil akhir tetap perlu survei lokasi, pengecekan bayangan, dan analisis panel listrik.
                </p>
            </div>

            <div
                x-data="{
                    monthlyKwh: 1300,
                    tariff: 1700,
                    psh: 4.5,
                    pr: 0.8,
                    panelWp: 550,
                    get dailyNeed() { return this.monthlyKwh > 0 ? this.monthlyKwh / 30 : 0; },
                    get systemKwp() { return this.psh > 0 && this.pr > 0 ? this.dailyNeed / (this.psh * this.pr) : 0; },
                    get panelCount() { return this.panelWp > 0 ? Math.ceil((this.systemKwp * 1000) / this.panelWp) : 0; },
                    get monthlyProd() { return this.systemKwp * this.psh * this.pr * 30; },
                    get monthlySavingKwh() { return Math.min(this.monthlyProd, this.monthlyKwh); },
                    get monthlySavingRupiah() { return this.monthlySavingKwh * this.tariff; },
                    fmt(num, frac = 0) {
                        const value = Number.isFinite(Number(num)) ? Number(num) : 0;
                        return value.toLocaleString('id-ID', {
                            minimumFractionDigits: frac,
                            maximumFractionDigits: frac
                        });
                    }
                }"
                class="grid gap-6 lg:grid-cols-[1fr_1fr]"
            >
                <article class="rounded-[1.75rem] bg-white p-7 shadow-sm ring-1 ring-black/5" data-aos="fade-right">
                    <h3 class="text-2xl font-bold text-stone-950">Input Perhitungan</h3>
                    <p class="mt-2 text-sm leading-6 text-stone-500">Ubah angka sesuai kondisi lokasi atau tagihan listrik Anda.</p>

                    <div class="mt-7 grid gap-5 sm:grid-cols-2">
                        <label class="grid gap-2">
                            <span class="text-sm font-semibold text-stone-800">Pemakaian listrik per bulan (kWh)</span>
                            <input x-model.number="monthlyKwh" type="number" min="0" class="rounded-xl border border-stone-300 bg-white px-4 py-3 text-stone-950 outline-none focus:border-[#12268C]">
                        </label>
                        <label class="grid gap-2">
                            <span class="text-sm font-semibold text-stone-800">Tarif listrik (Rp/kWh)</span>
                            <input x-model.number="tariff" type="number" min="0" class="rounded-xl border border-stone-300 bg-white px-4 py-3 text-stone-950 outline-none focus:border-[#12268C]">
                        </label>
                        <label class="grid gap-2">
                            <span class="text-sm font-semibold text-stone-800">PSH rata-rata (jam/hari)</span>
                            <input x-model.number="psh" type="number" min="0" step="0.1" class="rounded-xl border border-stone-300 bg-white px-4 py-3 text-stone-950 outline-none focus:border-[#12268C]">
                        </label>
                        <label class="grid gap-2">
                            <span class="text-sm font-semibold text-stone-800">Performance ratio (0-1)</span>
                            <input x-model.number="pr" type="number" min="0" max="1" step="0.01" class="rounded-xl border border-stone-300 bg-white px-4 py-3 text-stone-950 outline-none focus:border-[#12268C]">
                        </label>
                        <label class="grid gap-2 sm:col-span-2">
                            <span class="text-sm font-semibold text-stone-800">Daya panel per unit (Wp)</span>
                            <input x-model.number="panelWp" type="number" min="1" class="rounded-xl border border-stone-300 bg-white px-4 py-3 text-stone-950 outline-none focus:border-[#12268C]">
                        </label>
                    </div>
                </article>

                <article class="rounded-[1.75rem] bg-stone-950 p-7 text-white shadow-sm ring-1 ring-black/5" data-aos="fade-left">
                    <h3 class="text-2xl font-bold">Hasil Estimasi</h3>
                    <p class="mt-2 text-sm leading-6 text-white/70">Rumus umum: kWp = (kWh bulanan/30) / (PSH x PR)</p>

                    <div class="mt-7 grid gap-4">
                        <div class="rounded-xl bg-stone-900 p-5">
                            <p class="text-sm text-white/65">Kebutuhan energi harian</p>
                            <p class="mt-1 text-2xl font-bold"><span x-text="fmt(dailyNeed, 2)"></span> kWh/hari</p>
                        </div>
                        <div class="rounded-xl bg-stone-900 p-5">
                            <p class="text-sm text-white/65">Estimasi kapasitas PLTS</p>
                            <p class="mt-1 text-2xl font-bold"><span x-text="fmt(systemKwp, 2)"></span> kWp</p>
                        </div>
                        <div class="rounded-xl bg-stone-900 p-5">
                            <p class="text-sm text-white/65">Estimasi jumlah panel</p>
                            <p class="mt-1 text-2xl font-bold"><span x-text="fmt(panelCount, 0)"></span> unit</p>
                        </div>
                        <div class="rounded-xl bg-stone-900 p-5">
                            <p class="text-sm text-white/65">Produksi energi bulanan</p>
                            <p class="mt-1 text-2xl font-bold"><span x-text="fmt(monthlyProd, 0)"></span> kWh/bulan</p>
                        </div>
                        <div class="rounded-xl bg-[#12268C] p-5 text-white">
                            <p class="text-sm font-semibold">Potensi penghematan bulanan</p>
                            <p class="mt-1 text-2xl font-black">Rp <span x-text="fmt(monthlySavingRupiah, 0)"></span></p>
                        </div>
                    </div>

                    <p class="mt-5 text-xs leading-6 text-white/70">
                        Catatan: hasil ini adalah simulasi awal. Nilai riil dipengaruhi arah atap, suhu modul, shading, kondisi inverter, wiring, dan pola beban aktual.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section id="innovation" class="bg-[#F3F5FF] py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_1.2fr] lg:items-end">
                <div data-aos="fade-up">
                    <p class="section-eyebrow">Pendekatan kami</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        PLTS yang dirancang dari data, bukan sekadar paket panel.
                    </h2>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        ['Desain sesuai kebutuhan energi', 'Kapasitas panel, inverter, dan baterai dihitung dari pola pemakaian, luas area, dan prioritas beban.'],
                        ['Pemantauan performa sistem', 'Produksi energi, konsumsi, dan kondisi sistem dapat dipantau agar performa tetap terjaga.'],
                    ] as $item)
                        <div data-aos="fade-up" class="rounded-[1.5rem] bg-white p-7 shadow-sm ring-1 ring-black/5 transition hover:-translate-y-1 hover:shadow-xl">
                            <div class="mb-8 h-1.5 w-14 rounded-full bg-[#12268C]"></div>
                            <h3 class="text-xl font-bold text-stone-950">{{ $item[0] }}</h3>
                            <p class="mt-4 leading-7 text-stone-600">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="impact" class="overflow-hidden bg-stone-950 py-20 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div data-aos="fade-right" class="relative min-h-[500px]">
                    <img src="https://images.unsplash.com/photo-1605980776566-0486c3ac7617?auto=format&fit=crop&w=1000&q=85" alt="Solar technician working" class="h-[500px] w-full rounded-[2rem] object-cover">
                    <div class="absolute inset-x-8 bottom-8 grid grid-cols-3 overflow-hidden rounded-[1.5rem] bg-stone-950 text-center">
                        @foreach ([['30%', 'Rata-rata hemat'], ['98%', 'Rasio performa'], ['2.500+', 'Instalasi']] as $stat)
                            <div class="border-r border-white/10 p-4 last:border-r-0">
                                <div class="text-2xl font-bold">{{ $stat[0] }}</div>
                                <div class="mt-1 text-xs text-white/65">{{ $stat[1] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left">
                    <p class="section-eyebrow text-[#12268C]">Dampak energi surya</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        Angka yang membantu keputusan investasi PLTS lebih jelas.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-white/70">
                        Setiap proyek kami mulai dari estimasi produksi, pola beban, dan potensi penghematan sehingga pemilik rumah dan bisnis memahami manfaatnya sejak awal.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <div class="flex -space-x-3">
                            @foreach ([
                                'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&q=80',
                                'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=120&q=80',
                                'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=120&q=80',
                                'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=120&q=80',
                            ] as $avatar)
                                <img src="{{ $avatar }}" alt="Partner portrait" class="h-12 w-12 rounded-full border-2 border-stone-950 object-cover">
                            @endforeach
                        </div>
                        <span class="text-sm font-semibold text-white/80">Mitra teknis dan pemasok untuk mendukung implementasi PLTS di Indonesia</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Layanan KIASOLAR</p>
                    <h2 class="mt-4 max-w-2xl text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Solusi PLTS untuk rumah, bisnis, industri, dan lokasi mandiri.
                    </h2>
                </div>
                <a href="#contact" data-aos="fade-left" class="inline-flex w-fit items-center gap-3 rounded-full bg-[#12268C] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0f2075]">
                    Minta estimasi
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach (config('kiasolar.solutions') as $serviceSlug => $service)
                    <article data-aos="fade-up" class="group overflow-hidden rounded-[2rem] bg-stone-100">
                        <div class="h-72 overflow-hidden">
                            <img src="{{ $service['hero_image'] }}" alt="{{ $service['name'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-7">
                            <div class="mb-5 text-sm font-bold text-[#12268C]">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3 class="text-2xl font-bold text-stone-950">{{ $service['name'] }}</h3>
                            <p class="mt-4 leading-7 text-stone-600">{{ $service['intro'] }}</p>
                            <a href="/layanan/{{ $serviceSlug }}" class="mt-6 inline-flex items-center text-sm font-bold text-stone-950">Pelajari layanan</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="growth" class="bg-[#F3F5FF] py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Pertumbuhan energi surya</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Energi surya semakin relevan untuk rumah dan industri Indonesia.
                    </h2>
                    <a href="#about" class="mt-8 inline-flex items-center gap-3 rounded-full border border-stone-300 px-5 py-3 text-sm font-bold text-stone-950 transition hover:bg-white">
                        Lihat tujuan kami
                    </a>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        ['Rumah', 'Solar rumah membantu mengurangi pemakaian listrik PLN pada siang hari.'],
                        ['Industri', 'PLTS industri membantu menekan biaya operasional dan mendukung target ESG.'],
                        ['Hybrid', 'PLTS hybrid memberi fleksibilitas karena dapat digabung baterai, PLN, atau genset.'],
                        ['BESS', 'Penyimpanan energi mendukung cadangan daya, pengurangan beban puncak, dan optimasi PLTS.'],
                    ] as $growth)
                        <div data-aos="zoom-in" class="rounded-[1.5rem] bg-white p-7 ring-1 ring-black/5">
                            <div class="text-4xl font-bold text-stone-950">{{ $growth[0] }}</div>
                            <p class="mt-4 leading-7 text-stone-600">{{ $growth[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="why" class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_1fr] lg:items-center">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Mengapa KIASOLAR</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Pendampingan PLTS dari analisis kebutuhan sampai sistem berjalan.
                    </h2>
                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        @foreach (['Analisis tagihan listrik', 'Desain sesuai lokasi', 'Instalasi rapi dan aman', 'Pemantauan performa'] as $benefit)
                            <div class="rounded-full border border-stone-200 px-5 py-3 text-sm font-bold text-stone-800">{{ $benefit }}</div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left" class="relative">
                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1000&q=85" alt="Solar panels in green field" class="h-[520px] w-full rounded-[2rem] object-cover">
                    <div class="absolute bottom-6 left-6 right-6 rounded-[1.5rem] bg-white p-6 shadow-xl">
                        <p class="leading-7 text-stone-700">
                            Kami menggabungkan survei lapangan, simulasi produksi energi, dan pemilihan komponen agar sistem PLTS sesuai kebutuhan nyata.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits" class="bg-stone-950 py-20 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 max-w-3xl" data-aos="fade-up">
                    <p class="section-eyebrow">Manfaat utama</p>
                <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                    Manfaat PLTS yang paling sering dicari pemilik rumah dan bisnis.
                </h2>
            </div>
            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Hemat tagihan listrik', 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=600&q=85'],
                    ['Perawatan rendah', 'https://images.unsplash.com/photo-1548611716-3000815a5803?auto=format&fit=crop&w=600&q=85'],
                    ['Pemantauan mudah', 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=600&q=85'],
                    ['Ramah lingkungan', 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=85'],
                ] as $benefit)
                    <article data-aos="fade-up" class="group relative h-80 overflow-hidden rounded-[1.5rem]">
                        <img src="{{ $benefit[1] }}" alt="{{ $benefit[0] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <h3 class="absolute bottom-6 left-6 right-6 text-2xl font-bold">{{ $benefit[0] }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimonials" class="overflow-hidden bg-[#F3F5FF] py-20 sm:py-28">
        <div class="mx-auto mb-12 max-w-7xl px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <p class="section-eyebrow">Testimoni</p>
            <h2 class="mt-4 max-w-2xl text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                Cerita pelanggan yang mulai beralih ke energi surya.
            </h2>
        </div>
        <div class="testimonial-marquee flex gap-5">
            @foreach (range(1, 2) as $loopIndex)
                @foreach ([
                    ['Andika Pratama', 'Pemilik rumah', 'Tim KIASOLAR menjelaskan kapasitas yang masuk akal, bukan sekadar menawarkan panel paling besar.'],
                    ['Maya Santoso', 'Manajer fasilitas', 'Pemantauannya membantu kami melihat produksi energi harian dan mengevaluasi penghematan listrik.'],
                    ['Rizal Hakim', 'Pemilik usaha', 'Proses survei dan instalasinya rapi. Operasional toko tetap berjalan selama pemasangan.'],
                    ['Dewi Lestari', 'Pengelola villa', 'Sistem hybrid membantu menjaga beban penting tetap menyala saat listrik tidak stabil.'],
                ] as $quote)
                    <article class="w-[320px] shrink-0 rounded-[1.5rem] bg-white p-6 shadow-sm ring-1 ring-black/5 sm:w-[420px]">
                        <div class="mb-6 flex items-center gap-3">
                            <div class="grid h-12 w-12 place-items-center rounded-full bg-[#DCE4FF] font-bold text-stone-950">{{ substr($quote[0], 0, 1) }}</div>
                            <div>
                                <h3 class="font-bold text-stone-950">{{ $quote[0] }}</h3>
                                <p class="text-sm text-stone-500">{{ $quote[1] }}</p>
                            </div>
                        </div>
                        <p class="text-lg leading-8 text-stone-700">"{{ $quote[2] }}"</p>
                    </article>
                @endforeach
            @endforeach
        </div>
    </section>

    <section id="blog" class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 max-w-3xl" data-aos="fade-up">
                <p class="section-eyebrow">Panduan energi surya</p>
                <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                    Artikel singkat untuk membantu memilih sistem PLTS.
                </h2>
                <p class="mt-5 text-lg leading-8 text-stone-600">
                    Konten edukasi ini membantu pengguna memahami perbedaan solar rumah, PLTS industri, on-grid, off-grid, hybrid, dan BESS sebelum konsultasi teknis.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['Apa beda PLTS on-grid, off-grid, dan hybrid?', 'On-grid cocok untuk penghematan harian, off-grid untuk lokasi tanpa PLN, sedangkan hybrid menambahkan baterai atau sumber cadangan.'],
                    ['Kapan bisnis perlu memakai BESS?', 'BESS relevan saat fasilitas membutuhkan cadangan daya, pengurangan beban puncak, atau ingin memaksimalkan energi dari PLTS.'],
                    ['Cara awal menghitung kebutuhan panel surya rumah', 'Mulai dari tagihan listrik, pola pemakaian siang hari, luas atap, dan perangkat yang ingin diprioritaskan.'],
                ] as $article)
                    <article data-aos="fade-up" class="rounded-[1.5rem] bg-stone-100 p-7">
                        <p class="mb-5 text-sm font-bold uppercase tracking-[0.12em] text-[#12268C]">Panduan PLTS</p>
                        <h3 class="text-2xl font-bold text-stone-950">{{ $article[0] }}</h3>
                        <p class="mt-4 leading-7 text-stone-600">{{ $article[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-stone-950 text-white">
                <div class="grid lg:grid-cols-[0.9fr_1.1fr]">
                    <div class="p-8 sm:p-12" data-aos="fade-right">
                        <p class="section-eyebrow">Hubungi kami</p>
                        <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                            Siap menghitung kebutuhan PLTS untuk lokasi Anda?
                        </h2>
                        <p class="mt-6 leading-8 text-white/70">
                            Ceritakan kebutuhan listrik, jenis bangunan, dan target penghematan. Tim KIASOLAR akan membantu estimasi sistem yang paling sesuai.
                        </p>
                        <div class="mt-10 space-y-4 text-white/80">
                            <p>(888) 456 7890</p>
                            <p>halo@kiasolar.id</p>
                            <p>Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <form class="bg-[#EEF1FF] p-8 text-stone-950 sm:p-12" data-aos="fade-left">
                        <div class="grid gap-5 sm:grid-cols-2">
                            <input class="rounded-full border border-[#B8C7FF] bg-white px-5 py-4 outline-none focus:border-[#12268C]" type="text" placeholder="Nama">
                            <input class="rounded-full border border-[#B8C7FF] bg-white px-5 py-4 outline-none focus:border-[#12268C]" type="email" placeholder="Email">
                        </div>
                        <input class="mt-5 w-full rounded-full border border-[#B8C7FF] bg-white px-5 py-4 outline-none focus:border-[#12268C]" type="text" placeholder="Jenis kebutuhan: solar rumah, industri, hybrid, BESS">
                        <textarea class="mt-5 h-36 w-full resize-none rounded-[1.25rem] border border-[#B8C7FF] bg-white px-5 py-4 outline-none focus:border-[#12268C]" placeholder="Ceritakan lokasi, daya listrik, dan target penghematan"></textarea>
                        <button type="submit" class="mt-5 inline-flex items-center gap-3 rounded-full bg-[#12268C] px-6 py-4 text-sm font-bold text-white transition hover:bg-[#0f2075]">
                            Minta konsultasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
