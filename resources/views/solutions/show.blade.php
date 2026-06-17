@php
    $url = url('/layanan/' . $slug);
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Service',
                '@id' => $url . '#service',
                'name' => $solution['name'] . ' Luma Daya',
                'description' => $solution['description'],
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Luma Daya',
                    'url' => url('/'),
                ],
                'areaServed' => 'Indonesia',
                'serviceType' => $solution['name'],
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => $url . '#breadcrumb',
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
                        'name' => 'Layanan',
                        'item' => url('/#services'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $solution['name'],
                        'item' => $url,
                    ],
                ],
            ],
            [
                '@type' => 'FAQPage',
                '@id' => $url . '#faq',
                'mainEntity' => array_map(fn ($item) => [
                    '@type' => 'Question',
                    'name' => $item[0],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item[1],
                    ],
                ], $solution['faq']),
            ],
        ],
    ];
@endphp

<x-layout.app :title="$solution['title']" :description="$solution['description']" :canonical="$url" :schema="$schema">
    <section class="relative overflow-hidden bg-stone-950 text-white">
        <div class="absolute inset-0">
            <img src="{{ $solution['hero_image'] }}" alt="{{ $solution['name'] }}" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/84 via-black/52 to-black/20"></div>
            <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-stone-950 to-transparent"></div>
        </div>

        <div class="relative z-10 mx-auto flex min-h-[82vh] max-w-7xl items-end px-4 pb-16 pt-32 sm:px-6 lg:px-8">
            <div class="max-w-4xl" data-aos="fade-up">
                <p class="hero-kicker mb-5">{{ $solution['kicker'] }}</p>
                <h1 class="text-5xl font-semibold leading-[0.96] tracking-normal sm:text-6xl lg:text-8xl">
                    {{ $solution['headline'] }}
                </h1>
                <p class="mt-8 max-w-2xl text-lg leading-8 text-white/78">
                    {{ $solution['intro'] }}
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div data-aos="fade-right">
                    <p class="section-eyebrow">Solusi Luma Daya</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                        Untuk siapa {{ strtolower($solution['name']) }} paling cocok?
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-stone-600">{{ $solution['audience'] }}</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2" data-aos="fade-left">
                    @foreach ($solution['benefits'] as $benefit)
                        <div class="rounded-[1.25rem] bg-[#F4FBF8] p-6 ring-1 ring-[#DCEBEE]">
                            <div class="mb-5 h-1.5 w-12 rounded-full bg-[#46B13F]"></div>
                            <h3 class="text-xl font-bold text-stone-950">{{ $benefit }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-stone-950 py-20 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr]">
                <div data-aos="fade-right">
                    <p class="section-eyebrow text-[#9DD6A6]">Tahapan kerja</p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        Proses yang jelas dari analisis sampai sistem aktif.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-white/70">
                        Setiap proyek dimulai dari data lapangan dan kebutuhan energi, bukan paket asal pasang. Tujuannya agar kapasitas sistem tepat, aman, dan mudah dirawat.
                    </p>
                </div>

                <div class="space-y-4" data-aos="fade-left">
                    @foreach ($solution['process'] as $index => $step)
                        <div class="flex gap-5 rounded-[1.25rem] bg-stone-900 p-6 ring-1 ring-stone-800">
                            <span class="text-sm font-black text-[#9DD6A6]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3 class="text-xl font-bold">{{ $step }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F4FBF8] py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 max-w-3xl" data-aos="fade-up">
                <p class="section-eyebrow">Pertanyaan umum</p>
                <h2 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">
                    FAQ {{ $solution['name'] }}
                </h2>
            </div>

            <div class="space-y-4" x-data="{ selected: 0 }">
                @foreach ($solution['faq'] as $index => $item)
                    <article class="rounded-[1.25rem] bg-white p-6 ring-1 ring-black/5" data-aos="fade-up">
                        <button type="button" class="flex w-full items-center justify-between gap-5 text-left" x-on:click="selected = selected === {{ $index }} ? null : {{ $index }}">
                            <span class="text-xl font-bold text-stone-950">{{ $item[0] }}</span>
                            <svg class="h-5 w-5 shrink-0 transition" :class="{ 'rotate-180': selected === {{ $index }} }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="overflow-hidden transition-all" x-ref="faq{{ $index }}" x-bind:style="selected === {{ $index }} ? 'max-height: ' + $refs.faq{{ $index }}.scrollHeight + 'px' : 'max-height: 0px'">
                            <p class="pt-5 leading-8 text-stone-600">{{ $item[1] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-[#0D3F93] p-8 text-white sm:p-12 lg:flex lg:items-center lg:justify-between">
                <div data-aos="fade-right">
                    <p class="section-eyebrow text-[#9DD6A6]">Konsultasi gratis</p>
                    <h2 class="mt-4 max-w-3xl text-4xl font-semibold leading-tight sm:text-5xl">
                        Ingin menghitung kebutuhan {{ strtolower($solution['name']) }}?
                    </h2>
                    <p class="mt-5 max-w-2xl leading-8 text-white/70">
                        Kirim tagihan listrik atau kebutuhan beban, lalu tim Luma Daya bantu estimasi kapasitas, skenario sistem, dan proyeksi penghematan.
                    </p>
                </div>
                <a href="/#contact" data-aos="fade-left" class="mt-8 inline-flex items-center rounded-full bg-[#0F4FB8] px-7 py-4 text-sm font-bold text-white transition hover:bg-[#0D3F93] lg:mt-0">
                    Hubungi Luma Daya
                </a>
            </div>
        </div>
    </section>
</x-layout.app>
