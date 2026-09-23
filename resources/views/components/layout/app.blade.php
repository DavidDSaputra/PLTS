@props(['title' => null, 'description' => null, 'canonical' => null, 'schema' => null])

@php
    $brandName = config('app.name', 'Luma Daya');
    $logoUrl = \App\Support\SiteSettings::mediaUrl(\App\Support\SiteSettings::get('navbar_logo'), asset('assets/images/logo1.png'));
    $defaultDescription = 'Luma Daya menyediakan solusi PLTS, solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS di Indonesia.';
    $whatsappNumber = preg_replace('/\D+/', '', \App\Support\SiteSettings::get('contact_phone', '+62 811 1234 5678'));

    if (str_starts_with($whatsappNumber, '0')) {
        $whatsappNumber = '62' . substr($whatsappNumber, 1);
    } elseif (str_starts_with($whatsappNumber, '8')) {
        $whatsappNumber = '62' . $whatsappNumber;
    }
@endphp

<!DOCTYPE html>
<html lang="id" class="scroll-smooth" style="background-color:#ffffff;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? $defaultDescription }}">
    <title>{{ $title ?? $brandName . ' | Smart Energy Solutions' }}</title>
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    <!-- Open Graph & Twitter Meta -->
    <meta property="og:title" content="{{ $title ?? $brandName . ' | Smart Energy Solutions' }}">
    <meta property="og:description" content="{{ $description ?? $defaultDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:site_name" content="{{ $brandName }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-64.png" sizes="64x64">
    <link rel="apple-touch-icon" href="/favicon-180.png">
    <link rel="icon" type="image/png" href="/favicon-192.png" sizes="192x192">

    <!-- Fonts -->
    <link rel="preconnect" href="https://api.fontshare.com">
    <link href="https://api.fontshare.com/v2/css?f[]=general-sans@400,500,600,700&f[]=cabinet-grotesk@500,700,800&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "Organization",
      "name": "{{ $brandName }}",
      "url": "{{ url('/') }}",
      "logo": "{{ $logoUrl }}",
      "description": "{{ $defaultDescription }}"
    }
    </script>

    @if ($schema)
        <script type="application/ld+json">
            {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
    @endif

    @stack('styles')
</head>
<body class="bg-white font-sans antialiased text-stone-950 selection:bg-[#0F4FB8] selection:text-white" style="background-color:#ffffff;">
    
    <x-navbar />

    <main id="main-content">
        {{ $slot }}
    </main>

    <x-footer />

    <a
        href="https://wa.me/{{ $whatsappNumber }}"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Hubungi Luma Daya melalui WhatsApp"
        title="Chat via WhatsApp"
        class="group fixed bottom-5 right-5 z-50 grid h-14 w-14 place-items-center rounded-full bg-[#25D366] text-white shadow-[0_10px_30px_rgba(37,211,102,0.4)] ring-1 ring-black/5 transition duration-200 hover:-translate-y-1 hover:bg-[#20bd5a] hover:shadow-[0_14px_34px_rgba(37,211,102,0.5)] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#25D366]/35 sm:bottom-7 sm:right-7 sm:h-16 sm:w-16"
    >
        <svg class="h-7 w-7 sm:h-8 sm:w-8" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path d="M27.28 4.65A15.39 15.39 0 0 0 3.06 23.21L.88 31.18l8.15-2.14a15.34 15.34 0 0 0 7.35 1.87h.01A15.39 15.39 0 0 0 27.28 4.65ZM16.39 28.31h-.01a12.75 12.75 0 0 1-6.5-1.78l-.47-.28-4.84 1.27 1.29-4.72-.3-.48a12.79 12.79 0 1 1 10.83 5.99Zm7.01-9.57c-.38-.19-2.27-1.12-2.62-1.25-.35-.13-.61-.19-.86.19-.26.38-.99 1.25-1.21 1.51-.22.26-.45.29-.83.1-.38-.19-1.62-.6-3.08-1.9a11.52 11.52 0 0 1-2.13-2.66c-.22-.38-.02-.59.17-.78.17-.17.38-.45.58-.67.19-.22.25-.38.38-.64.13-.26.06-.48-.03-.67-.1-.19-.86-2.08-1.18-2.85-.31-.75-.63-.65-.86-.66h-.74c-.26 0-.67.1-1.02.48-.35.38-1.34 1.31-1.34 3.2 0 1.89 1.38 3.72 1.57 3.98.19.26 2.71 4.14 6.56 5.8.92.4 1.63.63 2.19.81.92.29 1.76.25 2.42.15.74-.11 2.27-.93 2.59-1.83.32-.9.32-1.67.22-1.83-.09-.17-.35-.26-.73-.45Z"/>
        </svg>
        <span class="sr-only">Chat via WhatsApp</span>
    </a>

    @stack('scripts')
</body>
</html>
