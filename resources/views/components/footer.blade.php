@php
    $brandName = config('app.name', 'Luma Daya');
    $logoLandscape = asset('assets/images/logo_landscape.svg');
@endphp

<footer class="border-t border-[#DCEBEE] bg-white pb-10 pt-16 text-stone-950">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 border-b border-[#DCEBEE] pb-12 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
            <div>
                <a href="/" class="inline-flex h-[4rem] w-[13.5rem] items-center overflow-hidden rounded-[1.15rem] bg-white transition hover:opacity-90">
                    <img
                        src="{{ $logoLandscape }}"
                        alt="{{ $brandName }}"
                        class="h-full w-full object-contain object-center p-0.5"
                    >
                </a>
                <p class="mt-5 max-w-sm leading-7 text-stone-600">
                    Solusi PLTS dan penyimpanan energi untuk rumah, bisnis, dan industri dengan pendekatan yang efisien, aman, dan terukur.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#0F4FB8]">Halaman</h3>
                <div class="grid gap-3 text-sm text-stone-600">
                    <a href="/about" class="transition hover:text-[#0F4FB8]">Tentang</a>
                    <a href="/#services" class="transition hover:text-[#0F4FB8]">Layanan</a>
                    <a href="/#blog" class="transition hover:text-[#0F4FB8]">Panduan</a>
                    <a href="/#contact" class="transition hover:text-[#0F4FB8]">Kontak</a>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#0F4FB8]">Kontak</h3>
                <div class="grid gap-3 text-sm text-stone-600">
                    <a href="tel:8884567890" class="transition hover:text-[#0F4FB8]">(888) 456 7890</a>
                    <a href="mailto:info@example.com" class="transition hover:text-[#0F4FB8]">info@example.com</a>
                    <span>123 Riverbend, California 94025, USA</span>
                </div>
            </div>
 
            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#0F4FB8]">Follow us</h3>
                <div class="flex gap-3">
                    @foreach (['in', 'ig', 'fb'] as $social)
                        <a href="#" class="grid h-10 w-10 place-items-center rounded-full border border-[#DCEBEE] bg-[#F5FBF8] text-xs font-bold uppercase text-stone-700 transition hover:border-[#A8D5B3] hover:bg-[#EEF9EF] hover:text-[#0F4FB8]">{{ $social }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 text-sm text-stone-500 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} {{ $brandName }}. All rights reserved.</p>
            <p>Smart energy solutions untuk Indonesia.</p>
        </div>
    </div>
</footer>
