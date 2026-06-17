@php
    $solutions = config('kiasolar.solutions');
    $brandName = config('app.name', 'Luma Daya');
    $logoLandscape = asset('assets/images/logo1.png');
    $logoPortrait = asset('assets/images/logo2.png');

    $mainLinks = [
        ['href' => '/', 'label' => 'Beranda', 'active' => request()->path() === '/'],
        ['href' => '/about', 'label' => 'Tentang', 'active' => request()->is('about')],
        ['href' => '/#blog', 'label' => 'Blog', 'active' => false],
        ['href' => '/#contact', 'label' => 'Kontak', 'active' => false],
    ];
@endphp

<header
    x-data="{ scrolled: false, mobileMenuOpen: false, servicesOpen: false, mobileServicesOpen: false }"
    x-on:scroll.window="scrolled = window.scrollY > 24"
    x-on:keydown.escape.window="mobileMenuOpen = false; servicesOpen = false; mobileServicesOpen = false"
    class="fixed inset-x-0 top-0 z-50 px-4 pt-5 sm:px-6 lg:px-8"
>
    <div class="mx-auto max-w-7xl">

        {{-- Navbar pill --}}
        <div
            class="flex items-center justify-between rounded-[1.8rem] bg-white px-5 py-3 shadow-[0_4px_24px_rgba(0,0,0,0.07)] ring-1 ring-black/5 transition duration-300 lg:px-7 lg:py-3.5"
            :class="scrolled || mobileMenuOpen ? 'shadow-[0_8px_32px_rgba(0,0,0,0.12)]' : ''"
        >
            {{-- Logo --}}
            <a href="/" class="flex shrink-0 items-center">
                <img
                    src="{{ $logoPortrait }}"
                    alt="{{ $brandName }}"
                    class="block h-14 w-auto sm:hidden"
                >
                <img
                    src="{{ $logoLandscape }}"
                    alt="{{ $brandName }}"
                    class="hidden h-10 w-auto sm:block lg:h-11"
                >
            </a>

            {{-- Desktop nav --}}
            <div class="hidden items-center gap-3 lg:flex">

                {{-- Links grouped in pill --}}
                <nav class="flex items-center gap-0.5 rounded-full bg-stone-100/80 px-1.5 py-1.5" aria-label="Navigasi utama">
                    @foreach ($mainLinks as $link)
                        <a
                            href="{{ $link['href'] }}"
                            class="rounded-full px-4 py-2 text-sm font-medium transition
                                {{ $link['active']
                                    ? 'bg-white text-stone-950 shadow-sm'
                                    : 'text-stone-500 hover:bg-white/80 hover:text-stone-950' }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    @endforeach

                    {{-- Layanan dropdown --}}
                    <div
                        class="relative"
                        x-on:mouseenter="servicesOpen = true"
                        x-on:mouseleave="servicesOpen = false"
                    >
                        <button
                            type="button"
                            x-on:click="servicesOpen = !servicesOpen"
                            :aria-expanded="servicesOpen.toString()"
                            class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-medium transition
                                {{ request()->is('layanan*')
                                    ? 'bg-white text-stone-950 shadow-sm'
                                    : 'text-stone-500 hover:bg-white/80 hover:text-stone-950' }}"
                        >
                            Layanan
                            <svg class="h-3.5 w-3.5 transition" :class="{ 'rotate-180': servicesOpen }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        <div
                            x-show="servicesOpen"
                            x-transition.origin.top
                            x-cloak
                            class="absolute right-0 top-[calc(100%+0.85rem)] w-[32rem] rounded-[1.5rem] bg-white p-3 shadow-[0_20px_50px_rgba(15,79,184,0.13)] ring-1 ring-black/6"
                        >
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($solutions as $itemSlug => $item)
                                    <a href="/layanan/{{ $itemSlug }}" class="rounded-2xl p-4 transition hover:bg-stone-50">
                                        <span class="block text-sm font-bold text-stone-950">{{ $item['label'] }}</span>
                                        <span class="mt-1 block text-xs font-medium leading-5 text-stone-500">{{ $item['kicker'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav>

                {{-- Cart / Produk icon --}}
                <a
                    href="/layanan"
                    aria-label="Lihat produk"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-stone-100/80 text-stone-600 transition hover:bg-stone-200 hover:text-stone-950"
                >
                    <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 01-8 0"/>
                    </svg>
                </a>
            </div>

            {{-- Mobile: cart + hamburger --}}
            <div class="flex items-center gap-2 lg:hidden">
                <a
                    href="/layanan"
                    aria-label="Lihat produk"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-stone-100 text-stone-600 transition hover:bg-stone-200"
                >
                    <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 01-8 0"/>
                    </svg>
                </a>

                <button
                    type="button"
                    x-on:click="mobileMenuOpen = !mobileMenuOpen"
                    :aria-expanded="mobileMenuOpen.toString()"
                    aria-label="Toggle navigasi"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-stone-100 text-stone-700 transition hover:bg-stone-200"
                >
                    <svg x-show="!mobileMenuOpen" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="15" y2="12"/>
                        <line x1="3" y1="18" x2="18" y2="18"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile dropdown --}}
        <div
            x-show="mobileMenuOpen"
            x-transition.origin.top
            x-cloak
            class="mt-2 rounded-[1.5rem] bg-white p-3 shadow-[0_8px_30px_rgba(0,0,0,0.09)] ring-1 ring-black/5 lg:hidden"
        >
            <nav class="grid gap-0.5" aria-label="Navigasi mobile">
                @foreach ($mainLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        x-on:click="mobileMenuOpen = false"
                        class="rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-stone-50
                            {{ $link['active'] ? 'bg-stone-50 font-semibold text-stone-950' : 'text-stone-600' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <button
                    type="button"
                    x-on:click="mobileServicesOpen = !mobileServicesOpen"
                    :aria-expanded="mobileServicesOpen.toString()"
                    class="flex items-center justify-between rounded-xl px-4 py-3 text-left text-sm font-medium transition hover:bg-stone-50
                        {{ request()->is('layanan*') ? 'bg-stone-50 font-semibold text-stone-950' : 'text-stone-600' }}"
                >
                    <span>Layanan</span>
                    <svg class="h-4 w-4 transition" :class="{ 'rotate-180': mobileServicesOpen }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <div x-show="mobileServicesOpen" x-transition x-cloak class="grid gap-0.5 rounded-xl bg-stone-50 p-2">
                    @foreach ($solutions as $itemSlug => $item)
                        <a
                            href="/layanan/{{ $itemSlug }}"
                            x-on:click="mobileMenuOpen = false"
                            class="rounded-lg px-4 py-2.5 text-sm font-medium text-stone-600 transition hover:bg-white hover:text-stone-950"
                        >
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="mt-1 border-t border-stone-100 pt-2">
                    <a
                        href="/#contact"
                        x-on:click="mobileMenuOpen = false"
                        class="flex items-center justify-center rounded-xl bg-[#0F4FB8] px-4 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]"
                    >
                        Minta penawaran
                    </a>
                </div>
            </nav>
        </div>

    </div>
</header>
