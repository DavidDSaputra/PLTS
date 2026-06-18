@php
    $brandName = config('app.name', 'Luma Daya');
    $logoLandscape = \App\Support\SiteSettings::mediaUrl(\App\Support\SiteSettings::get('footer_logo'), asset('assets/images/logo1.png'));
    $contactPhone = \App\Support\SiteSettings::get('contact_phone', '(888) 456 7890');
    $contactEmail = \App\Support\SiteSettings::get('contact_email', 'halo@lumadaya.id');
    $contactAddress = \App\Support\SiteSettings::get('contact_address', 'Jakarta, Indonesia');
    $siteTagline = \App\Support\SiteSettings::get('site_tagline', 'Smart energy solutions untuk Indonesia.');
    $socialLinks = [
        [
            'label' => 'in',
            'name' => 'LinkedIn',
            'href' => \App\Support\SiteSettings::get('linkedin_url', '#'),
            'class' => 'border-[#B9D9F2] bg-[#EFF8FF] text-[#0A66C2] hover:border-[#0A66C2] hover:bg-[#0A66C2] hover:text-white',
        ],
        [
            'label' => 'ig',
            'name' => 'Instagram',
            'href' => \App\Support\SiteSettings::get('instagram_url', '#'),
            'class' => 'border-[#F6C1D8] bg-[#FFF2F7] text-[#E4405F] hover:border-[#E4405F] hover:bg-[#E4405F] hover:text-white',
        ],
        [
            'label' => 'fb',
            'name' => 'Facebook',
            'href' => \App\Support\SiteSettings::get('facebook_url', '#'),
            'class' => 'border-[#BED4FF] bg-[#F1F6FF] text-[#1877F2] hover:border-[#1877F2] hover:bg-[#1877F2] hover:text-white',
        ],
    ];
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
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactPhone) }}" class="transition hover:text-[#0F4FB8]">{{ $contactPhone }}</a>
                    <a href="mailto:{{ $contactEmail }}" class="transition hover:text-[#0F4FB8]">{{ $contactEmail }}</a>
                    <span>{{ $contactAddress }}</span>
                </div>
            </div>
 
            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#0F4FB8]">Follow us</h3>
                <div class="flex gap-3">
                    @foreach ($socialLinks as $social)
                        <a
                            href="{{ $social['href'] ?: '#' }}"
                            aria-label="{{ $social['name'] }}"
                            class="grid h-10 w-10 place-items-center rounded-full border text-xs font-bold uppercase transition {{ $social['class'] }}"
                        >
                            {{ $social['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 text-sm text-stone-500 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} {{ $brandName }}. All rights reserved.</p>
            <p>{{ $siteTagline }}</p>
        </div>
    </div>
</footer>
