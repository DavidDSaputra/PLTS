@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="id" class="bg-[#F6F8FA]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Admin Luma Daya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F6F8FA] font-sans text-stone-950">
    <div class="min-h-screen lg:flex">
        <aside class="border-b border-stone-200 bg-white lg:fixed lg:inset-y-0 lg:left-0 lg:w-72 lg:border-b-0 lg:border-r">
            <div class="flex h-20 items-center justify-between px-6">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-black text-[#0F4FB8]">Luma Admin</a>
                <a href="/" class="text-sm font-semibold text-stone-500 hover:text-stone-950">Lihat situs</a>
            </div>
            <nav class="grid gap-1 px-4 pb-5 text-sm font-semibold">
                @foreach ([
                    ['href' => route('admin.dashboard'), 'label' => 'Dashboard', 'active' => request()->routeIs('admin.dashboard')],
                    ['href' => route('admin.articles.index'), 'label' => 'Artikel', 'active' => request()->routeIs('admin.articles.*')],
                    ['href' => route('admin.hero-slides.index'), 'label' => 'Hero slider', 'active' => request()->routeIs('admin.hero-slides.*')],
                    ['href' => route('admin.settings.edit'), 'label' => 'Kontak & setting', 'active' => request()->routeIs('admin.settings.*')],
                ] as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="rounded-xl px-4 py-3 transition {{ $item['active'] ? 'bg-[#EEF8FF] text-[#0F4FB8]' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-950' }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="w-full lg:pl-72">
            <header class="sticky top-0 z-30 border-b border-stone-200 bg-white/90 px-4 py-4 backdrop-blur sm:px-6 lg:px-8">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0F4FB8]">Admin panel</p>
                        <h1 class="mt-1 text-2xl font-bold">{{ $title }}</h1>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="rounded-xl border border-stone-200 px-4 py-2 text-sm font-bold text-stone-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-800">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
                        Ada input yang perlu diperiksa lagi.
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
