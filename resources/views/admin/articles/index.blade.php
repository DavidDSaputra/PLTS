<x-admin.layout title="Artikel">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-stone-500">Kelola artikel yang tampil di bagian Blog homepage.</p>
        <a href="{{ route('admin.articles.create') }}" class="inline-flex w-fit items-center justify-center rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">
            Tambah artikel
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="border-b border-stone-200 bg-stone-50 text-xs uppercase tracking-[0.12em] text-stone-500">
                    <tr>
                        <th class="px-5 py-4">Artikel</th>
                        <th class="px-5 py-4">Kategori</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Tanggal</th>
                        <th class="px-5 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($articles as $article)
                        <tr>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-14 w-20 overflow-hidden rounded-lg bg-stone-100">
                                        @if ($article->imageUrl())
                                            <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-stone-950">{{ $article->title }}</p>
                                        <p class="mt-1 text-xs text-stone-500">/{{ $article->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-stone-600">{{ $article->category ?: '-' }}</td>
                            <td class="px-5 py-4">
                                <span class="rounded-full px-3 py-1 text-xs font-bold {{ $article->is_published ? 'bg-green-50 text-green-700' : 'bg-stone-100 text-stone-600' }}">
                                    {{ $article->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-stone-600">{{ $article->published_at?->format('d M Y') ?: '-' }}</td>
                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="rounded-lg border border-stone-200 px-3 py-2 font-bold text-stone-600 transition hover:bg-stone-50">Edit</a>
                                    <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-lg border border-red-200 px-3 py-2 font-bold text-red-600 transition hover:bg-red-50">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-10 text-center text-stone-500">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $articles->links() }}
    </div>
</x-admin.layout>
