<x-admin.layout title="Hero Slider">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-stone-500">Kelola gambar, headline, dan urutan slider homepage.</p>
        <a href="{{ route('admin.hero-slides.create') }}" class="inline-flex w-fit items-center justify-center rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">
            Tambah slide
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="border-b border-stone-200 bg-stone-50 text-xs uppercase tracking-[0.12em] text-stone-500">
                    <tr>
                        <th class="px-5 py-4">Slide</th>
                        <th class="px-5 py-4">Urutan</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($slides as $slide)
                        <tr>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-16 w-28 overflow-hidden rounded-lg bg-stone-100">
                                        @if ($slide->imageUrl())
                                            <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->alt_text ?: $slide->title }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-stone-950">{{ $slide->title }}</p>
                                        <p class="mt-1 line-clamp-1 text-xs text-stone-500">{{ $slide->subtitle }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 font-semibold text-stone-600">{{ $slide->sort_order }}</td>
                            <td class="px-5 py-4">
                                <span class="rounded-full px-3 py-1 text-xs font-bold {{ $slide->is_active ? 'bg-green-50 text-green-700' : 'bg-stone-100 text-stone-600' }}">
                                    {{ $slide->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="rounded-lg border border-stone-200 px-3 py-2 font-bold text-stone-600 transition hover:bg-stone-50">Edit</a>
                                    <form method="POST" action="{{ route('admin.hero-slides.destroy', $slide) }}" onsubmit="return confirm('Hapus slide ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-lg border border-red-200 px-3 py-2 font-bold text-red-600 transition hover:bg-red-50">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-10 text-center text-stone-500">Belum ada hero slide.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $slides->links() }}
    </div>
</x-admin.layout>
