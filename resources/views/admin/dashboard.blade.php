<x-admin.layout title="Dashboard">
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            ['label' => 'Total artikel', 'value' => $articleCount],
            ['label' => 'Artikel publish', 'value' => $publishedArticleCount],
            ['label' => 'Total hero slide', 'value' => $heroSlideCount],
            ['label' => 'Hero aktif', 'value' => $activeHeroSlideCount],
        ] as $card)
            <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
                <p class="text-sm font-semibold text-stone-500">{{ $card['label'] }}</p>
                <p class="mt-3 text-4xl font-black text-stone-950">{{ $card['value'] }}</p>
            </article>
        @endforeach
    </div>

    <div class="mt-8 grid gap-5 lg:grid-cols-3">
        <a href="{{ route('admin.articles.create') }}" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition hover:-translate-y-0.5 hover:shadow-lg">
            <h2 class="text-xl font-bold">Tambah artikel</h2>
            <p class="mt-2 text-sm leading-6 text-stone-500">Buat artikel baru untuk bagian Blog di homepage.</p>
        </a>
        <a href="{{ route('admin.hero-slides.create') }}" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition hover:-translate-y-0.5 hover:shadow-lg">
            <h2 class="text-xl font-bold">Tambah hero slide</h2>
            <p class="mt-2 text-sm leading-6 text-stone-500">Ubah gambar dan headline besar di halaman depan.</p>
        </a>
        <a href="{{ route('admin.settings.edit') }}" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition hover:-translate-y-0.5 hover:shadow-lg">
            <h2 class="text-xl font-bold">Edit kontak</h2>
            <p class="mt-2 text-sm leading-6 text-stone-500">Update email, telepon, alamat, social link, dan logo.</p>
        </a>
    </div>
</x-admin.layout>
