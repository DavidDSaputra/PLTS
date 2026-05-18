@php
    $solutions = config('kiasolar.solutions');

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
    class="fixed inset-x-0 top-0 z-50 px-4 pt-4 text-stone-950 sm:px-6"
>
    <div class="mx-auto max-w-7xl">
        <div
            class="grid min-h-16 grid-cols-[auto_auto] items-center justify-between gap-3 rounded-[1.35rem] bg-white/95 p-2 shadow-xl shadow-black/12 ring-1 ring-black/8 backdrop-blur-xl transition duration-300 lg:min-h-[76px] lg:grid-cols-[auto_1fr_auto] lg:gap-6 lg:rounded-full"
            :class="scrolled || mobileMenuOpen ? 'shadow-2xl shadow-black/20' : ''"
        >
            <a href="/" class="group flex shrink-0 items-center gap-3 rounded-full py-1 pl-1 pr-3 transition hover:bg-stone-100 sm:pr-4">
                <span class="grid h-11 w-11 place-items-center rounded-full bg-stone-950 shadow-inner shadow-white/10 transition group-hover:bg-[#12268C]">
                    <span class="grid gap-1">
                        <span class="block h-1.5 w-4 skew-y-[-28deg] rounded-sm bg-white"></span>
                        <span class="block h-1.5 w-4 skew-y-[-28deg] rounded-sm bg-[#B8C7FF]"></span>
                    </span>
                </span>
                <span class="text-xl font-black tracking-normal text-stone-950 sm:text-2xl">KALSOLAR</span>
            </a>

            <nav class="hidden items-center justify-center lg:flex" aria-label="Navigasi utama">
                <div class="flex items-center gap-1 rounded-full bg-stone-100 p-1 text-sm font-bold text-stone-500">
                    @foreach ($mainLinks as $link)
                        <a
                            href="{{ $link['href'] }}"
                            class="rounded-full px-5 py-3 transition hover:bg-white hover:text-stone-950 {{ $link['active'] ? 'bg-white text-stone-950 shadow-sm' : '' }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    @endforeach

                    <div
                        class="relative"
                        x-on:mouseenter="servicesOpen = true"
                        x-on:mouseleave="servicesOpen = false"
                    >
                        <button
                            type="button"
                            x-on:click="servicesOpen = !servicesOpen"
                            class="inline-flex items-center gap-2 rounded-full px-5 py-3 transition hover:bg-white hover:text-stone-950 {{ request()->is('layanan*') ? 'bg-white text-stone-950 shadow-sm' : '' }}"
                            :aria-expanded="servicesOpen.toString()"
                        >
                            Layanan
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': servicesOpen }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <div
                            x-show="servicesOpen"
                            x-transition.origin.top
                            x-cloak
                            class="absolute left-1/2 top-[calc(100%+0.85rem)] w-[34rem] -translate-x-1/2 rounded-[1.5rem] bg-white p-3 text-stone-950 shadow-2xl shadow-black/20 ring-1 ring-black/10"
                        >
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($solutions as $itemSlug => $item)
                                    <a href="/layanan/{{ $itemSlug }}" class="group rounded-2xl p-4 transition hover:bg-[#EEF1FF]">
                                        <span class="block text-sm font-bold text-stone-950">{{ $item['label'] }}</span>
                                        <span class="mt-1 block text-xs font-medium leading-5 text-stone-500">{{ $item['kicker'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="flex shrink-0 items-center justify-end gap-2">
                <a href="/#contact" class="hidden items-center gap-3 rounded-full bg-stone-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#12268C] lg:inline-flex">
                    Minta penawaran
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 12H19M13 6L19 12L13 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <button
                    type="button"
                    x-on:click="mobileMenuOpen = !mobileMenuOpen"
                    class="relative grid h-11 w-11 place-items-center rounded-full bg-stone-100 text-stone-950 transition hover:bg-[#EEF1FF] lg:hidden"
                    :aria-expanded="mobileMenuOpen.toString()"
                    aria-label="Toggle navigation"
                >
                    <span class="relative h-4 w-5">
                        <span class="absolute left-0 top-0 h-0.5 w-5 rounded-full bg-current transition" :class="mobileMenuOpen ? 'top-1.5 rotate-45' : ''"></span>
                        <span class="absolute left-0 top-1.5 h-0.5 w-5 rounded-full bg-current transition" :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                        <span class="absolute left-0 top-3 h-0.5 w-5 rounded-full bg-current transition" :class="mobileMenuOpen ? 'top-1.5 -rotate-45' : ''"></span>
                    </span>
                </button>
            </div>
        </div>

        <div
            x-show="mobileMenuOpen"
            x-transition.origin.top
            x-cloak
            class="mt-3 rounded-[1.35rem] bg-white/96 p-3 text-stone-950 shadow-2xl shadow-black/20 ring-1 ring-black/10 backdrop-blur-xl lg:hidden"
        >
            <nav class="grid gap-1 text-sm font-bold" aria-label="Navigasi mobile">
                @foreach ($mainLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        x-on:click="mobileMenuOpen = false"
                        class="rounded-2xl px-4 py-3 transition hover:bg-[#EEF1FF] {{ $link['active'] ? 'bg-stone-100' : '' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <button
                    type="button"
                    x-on:click="mobileServicesOpen = !mobileServicesOpen"
                    class="flex items-center justify-between rounded-2xl px-4 py-3 text-left transition hover:bg-[#EEF1FF] {{ request()->is('layanan*') ? 'bg-stone-100' : '' }}"
                    :aria-expanded="mobileServicesOpen.toString()"
                >
                    <span>Layanan</span>
                    <svg class="h-4 w-4 transition" :class="{ 'rotate-180': mobileServicesOpen }" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div x-show="mobileServicesOpen" x-transition x-cloak class="grid gap-1 rounded-2xl bg-stone-100 p-2">
                    @foreach ($solutions as $itemSlug => $item)
                        <a href="/layanan/{{ $itemSlug }}" x-on:click="mobileMenuOpen = false" class="rounded-xl px-4 py-3 text-sm font-semibold text-stone-700 transition hover:bg-white hover:text-stone-950">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <a href="/#contact" x-on:click="mobileMenuOpen = false" class="mt-2 inline-flex items-center justify-center gap-3 rounded-full bg-stone-950 px-5 py-3 text-center text-sm font-bold text-white transition hover:bg-[#12268C]">
                    Minta penawaran
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 12H19M13 6L19 12L13 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</header>
