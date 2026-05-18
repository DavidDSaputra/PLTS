<footer class="bg-stone-950 pb-10 pt-16 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 border-b border-white/10 pb-12 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
            <div>
                <a href="/" class="flex items-center gap-3">
                    <span class="grid h-11 w-11 place-items-center rounded-full bg-[#12268C] text-sm font-black text-white">K</span>
                    <span class="text-xl font-black">KALSOLAR</span>
                </a>
                <p class="mt-5 max-w-sm leading-7 text-white/65">
                    Solusi PLTS dan penyimpanan energi untuk rumah, bisnis, dan industri yang ingin menghemat listrik dengan sistem yang aman dan terukur.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#C8D3FF]">Halaman</h3>
                <div class="grid gap-3 text-sm text-white/65">
                    <a href="/about" class="transition hover:text-white">Tentang</a>
                    <a href="/#services" class="transition hover:text-white">Layanan</a>
                    <a href="/#blog" class="transition hover:text-white">Panduan</a>
                    <a href="/#contact" class="transition hover:text-white">Kontak</a>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#C8D3FF]">Kontak</h3>
                <div class="grid gap-3 text-sm text-white/65">
                    <a href="tel:8884567890" class="transition hover:text-white">(888) 456 7890</a>
                    <a href="mailto:info@example.com" class="transition hover:text-white">info@example.com</a>
                    <span>123 Riverbend, California 94025, USA</span>
                </div>
            </div>
 
            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#C8D3FF]">Follow us</h3>
                <div class="flex gap-3">From: [your-name] <[your-email]>
Nomor Telepon: [your-phone]
Subject: [your-subject]

Message Body:
[your-message]

--
This is a notification that a contact form was submitted on your website ([_site_url]).
                    @foreach (['in', 'ig', 'fb'] as $social)
                        <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-stone-900 text-xs font-bold uppercase transition hover:bg-[#12268C] hover:text-white">{{ $social }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 text-sm text-white/45 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} KALSOLAR. All rights reserved.</p>
            <p>Solusi energi surya untuk Indonesia.</p>
        </div>
    </div>
</footer>
