@props(['title' => null, 'description' => null, 'canonical' => null, 'schema' => null])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth" style="background-color:#0c0a09;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? 'KALSOLAR menyediakan solusi PLTS, solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS di Indonesia.' }}">
    <title>{{ $title ?? 'KALSOLAR | Solusi PLTS dan Energi Surya' }}</title>
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    <!-- Open Graph & Twitter Meta -->
    <meta property="og:title" content="{{ $title ?? 'KALSOLAR | Solusi PLTS dan Energi Surya' }}">
    <meta property="og:description" content="{{ $description ?? 'Solusi PLTS, solar rumah, solar industri, hybrid, off-grid, on-grid, dan BESS di Indonesia.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:site_name" content="KALSOLAR">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="twitter:card" content="summary_large_image">

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
      "name": "KALSOLAR",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/logo.png') }}",
      "description": "Solusi PLTS, solar rumah, solar industri, PLTS hybrid, off-grid, on-grid, dan BESS di Indonesia"
    }
    </script>

    @if ($schema)
        <script type="application/ld+json">
            {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
    @endif

    @stack('styles')
</head>
<body class="font-sans antialiased text-stone-950 bg-stone-950 selection:bg-[#12268C] selection:text-white" style="background-color:#0c0a09;">
    
    <x-navbar />

    <main id="main-content">
        {{ $slot }}
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>
