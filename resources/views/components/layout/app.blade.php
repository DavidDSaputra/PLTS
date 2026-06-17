@props(['title' => null, 'description' => null, 'canonical' => null, 'schema' => null])

@php
    $brandName = config('app.name', 'Luma Daya');
    $logoUrl = asset('assets/images/logo_landscape.svg');
    $defaultDescription = 'Luma Daya menyediakan solusi PLTS, solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS di Indonesia.';
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

    @stack('scripts')
</body>
</html>
