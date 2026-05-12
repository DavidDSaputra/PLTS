<header
    x-data="{ scrolled: false, mobileMenuOpen: false, pagesOpen: false }"
    x-on:scroll.window="scrolled = window.pageYOffset > 24"
    :class="scrolled ? 'bg-stone-950 shadow-xl shadow-black/20' : 'bg-transparent'"
    class="fixed inset-x-0 top-0 z-50 transition duration-300"
>
    <div
        class="relative mx-auto flex h-20 max-w-7xl items-center justify-between px-4 text-white transition duration-300 sm:px-6 lg:px-8"
    >
        <a href="/" class="flex items-center gap-3">
            <span class="grid gap-1">
                <span class="block h-2.5 w-5 skew-y-[-28deg] bg-white"></span>
                <span class="block h-2.5 w-5 skew-y-[-28deg] bg-[#12268C]"></span>
            </span>
            <span class="text-2xl font-black tracking-normal sm:text-3xl">KIASOLAR</span>
        </a>

        <nav class="absolute left-1/2 hidden -translate-x-1/2 justify-center lg:flex">
            <div class="flex items-center gap-14 text-[22px] font-semibold leading-none tracking-normal">
                <a href="/" class="nav-link">Beranda</a>
                <a href="/about" class="nav-link">Tentang</a>
                <div class="relative" x-on:mouseenter="pagesOpen = true" x-on:mouseleave="pagesOpen = false">
                    <button type="button" x-on:click="pagesOpen = !pagesOpen" class="inline-flex items-center gap-3">
                        Layanan
                        <svg class="h-4 w-4 transition" :class="{ 'rotate-180': pagesOpen }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div
                        x-show="pagesOpen"
                        x-transition
                        x-cloak
                        class="absolute left-1/2 top-9 w-72 -translate-x-1/2 rounded-2xl bg-white p-3 text-base font-bold text-stone-950 shadow-2xl ring-1 ring-black/10"
                    >
                        @foreach (config('kiasolar.solutions') as $itemSlug => $item)
                            <a href="/layanan/{{ $itemSlug }}" class="block rounded-xl px-4 py-3 transition hover:bg-[#EEF1FF]">{{ $item['label'] }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="/#blog" class="nav-link">Blog</a>
                <a href="/#contact" class="nav-link">Kontak</a>
            </div>
        </nav>

        <button
            type="button"
            x-on:click="mobileMenuOpen = !mobileMenuOpen"
            class="ml-auto grid h-10 w-10 place-items-center text-white lg:hidden"
            aria-label="Toggle navigation"
        >
            <svg x-show="!mobileMenuOpen" class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 7H20M4 12H20M4 17H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
            </svg>
            <svg x-show="mobileMenuOpen" x-cloak class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
            </svg>
        </button>
        <a href="/#contact" class="hidden items-center gap-5 rounded-full bg-[#12268C] px-7 py-4 text-base font-bold text-white transition hover:bg-white hover:text-[#12268C] lg:inline-flex">
            Minta penawaran
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 12H19M13 6L19 12L13 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>

    <div
        x-show="mobileMenuOpen"
        x-transition
        x-cloak
        class="mx-auto mt-3 max-w-7xl rounded-[1.5rem] bg-white p-4 text-stone-950 shadow-2xl ring-1 ring-black/10 lg:hidden"
    >
        <nav class="grid gap-2 text-sm font-bold">
            @foreach ([
                '/' => 'Beranda',
                '/about' => 'Tentang',
                '/layanan/solar-rumah' => 'Solar Rumah',
                '/layanan/solar-industri' => 'Solar Industri',
                '/layanan/plts-hybrid' => 'PLTS Hybrid',
                '/layanan/off-grid' => 'Off-Grid',
                '/layanan/on-grid' => 'On-Grid',
                '/layanan/bess' => 'BESS',
                '/#blog' => 'Blog',
                '/#contact' => 'Kontak',
            ] as $href => $label)
                <a href="{{ $href }}" x-on:click="mobileMenuOpen = false" class="rounded-full px-4 py-3 transition hover:bg-[#EEF1FF]">{{ $label }}</a>
            @endforeach
        </nav>
    </div>
</header>
