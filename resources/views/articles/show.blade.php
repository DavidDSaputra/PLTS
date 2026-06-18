<x-layout.app :title="$article->title . ' | Luma Daya'" :description="$article->excerpt">
    <article class="bg-white pb-20 pt-36 sm:pt-40">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <a href="/#blog" class="text-sm font-bold text-[#0F4FB8]">Kembali ke blog</a>
            <p class="mt-8 text-sm font-bold uppercase tracking-[0.14em] text-[#0F4FB8]">{{ $article->category ?: 'Panduan PLTS' }}</p>
            <h1 class="mt-4 text-4xl font-semibold leading-tight text-stone-950 sm:text-5xl">{{ $article->title }}</h1>
            @if ($article->excerpt)
                <p class="mt-6 text-lg leading-8 text-stone-600">{{ $article->excerpt }}</p>
            @endif
        </div>

        @if ($article->imageUrl())
            <div class="mx-auto mt-10 max-w-5xl px-4 sm:px-6 lg:px-8">
                <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" class="h-[420px] w-full rounded-[2rem] object-cover">
            </div>
        @endif

        <div class="mx-auto mt-10 max-w-3xl px-4 text-lg leading-8 text-stone-700 sm:px-6 lg:px-8">
            {!! nl2br(e($article->body)) !!}
        </div>
    </article>
</x-layout.app>
