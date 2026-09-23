<x-admin.layout title="Gambar homepage">
    <div class="mb-8 rounded-2xl bg-[#EEF8FF] p-6 ring-1 ring-[#0F4FB8]/10">
        <h2 class="text-xl font-bold text-stone-950">Semua gambar homepage dalam satu tempat</h2>
        <p class="mt-2 max-w-3xl text-sm leading-6 text-stone-600">
            Unggah gambar dari perangkat atau tempel URL gambar. Setiap perubahan langsung digunakan di homepage setelah disimpan.
            Hero slider dan gambar artikel dikelola melalui modul khususnya agar urutan dan kontennya tetap mudah diatur.
        </p>
        <div class="mt-5 flex flex-wrap gap-3">
            <a href="{{ route('admin.hero-slides.index') }}" class="rounded-xl bg-[#0F4FB8] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#0D3F93]">Kelola hero slider</a>
            <a href="{{ route('admin.articles.index') }}" class="rounded-xl border border-[#0F4FB8]/20 bg-white px-4 py-2.5 text-sm font-bold text-[#0F4FB8] transition hover:bg-[#DCEFFF]">Kelola gambar artikel</a>
            <a href="/" target="_blank" rel="noopener" class="rounded-xl border border-stone-200 bg-white px-4 py-2.5 text-sm font-bold text-stone-600 transition hover:bg-stone-50">Buka homepage</a>
        </div>
    </div>

    @foreach ($images as $group => $groupImages)
        <section class="mb-10">
            <div class="mb-4 flex items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0F4FB8]">Bagian homepage</p>
                    <h2 class="mt-1 text-2xl font-bold">{{ $group }}</h2>
                </div>
                <span class="text-sm font-semibold text-stone-400">{{ $groupImages->count() }} gambar</span>
            </div>

            <div class="grid gap-5 lg:grid-cols-2">
                @foreach ($groupImages as $image)
                    <form
                        method="POST"
                        action="{{ route('admin.homepage-images.update') }}"
                        enctype="multipart/form-data"
                        class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-black/5"
                        x-data="{ preview: null, reset: false }"
                    >
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="key" value="{{ $image['key'] }}">

                        <div class="relative grid h-56 place-items-center overflow-hidden bg-stone-100">
                            <img
                                :src="preview || @js($image['url'])"
                                alt="Preview {{ $image['label'] }}"
                                class="h-full w-full {{ ($image['contain'] ?? false) ? 'object-contain p-6' : 'object-cover' }}"
                            >
                            <span class="absolute right-3 top-3 rounded-full px-3 py-1 text-xs font-bold shadow-sm {{ $image['is_custom'] ? 'bg-green-100 text-green-800' : 'bg-white text-stone-600' }}">
                                {{ $image['is_custom'] ? 'Gambar kustom' : 'Gambar bawaan' }}
                            </span>
                        </div>

                        <div class="p-5">
                            <h3 class="text-lg font-bold">{{ $image['label'] }}</h3>
                            <p class="mt-1 text-sm leading-6 text-stone-500">{{ $image['description'] }}</p>
                            <p class="mt-2 text-xs font-semibold text-stone-400">Rekomendasi: {{ $image['recommended'] }}</p>

                            <div class="mt-5 grid gap-4">
                                <label class="grid gap-2">
                                    <span class="text-sm font-semibold">Upload gambar baru</span>
                                    <input
                                        name="image"
                                        type="file"
                                        accept="image/jpeg,image/png,image/webp,image/avif"
                                        @change="const file = $event.target.files[0]; if (file) { preview = URL.createObjectURL(file); reset = false }"
                                        class="rounded-xl border border-stone-300 px-3 py-2.5 text-sm outline-none file:mr-3 file:rounded-lg file:border-0 file:bg-[#EEF8FF] file:px-3 file:py-2 file:font-bold file:text-[#0F4FB8]"
                                    >
                                </label>

                                <label class="grid gap-2">
                                    <span class="text-sm font-semibold">Atau URL gambar</span>
                                    <input
                                        name="image_url"
                                        type="url"
                                        value="{{ old('key') === $image['key'] ? old('image_url') : $image['custom_url'] }}"
                                        placeholder="https://..."
                                        class="rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none focus:border-[#0F4FB8]"
                                    >
                                </label>

                                @if ($image['is_custom'])
                                    <label class="flex items-start gap-3 rounded-xl bg-stone-50 p-4 text-sm">
                                        <input name="remove" type="checkbox" value="1" x-model="reset" class="mt-0.5 rounded border-stone-300 text-red-600">
                                        <span>
                                            <span class="block font-bold text-stone-800">Kembalikan ke gambar bawaan</span>
                                            <span class="mt-1 block leading-5 text-stone-500">Gambar kustom saat ini akan dihapus saat disimpan.</span>
                                        </span>
                                    </label>
                                @endif
                            </div>

                            @if (old('key') === $image['key'])
                                @error('image') <p class="mt-3 text-sm font-semibold text-red-600">{{ $message }}</p> @enderror
                                @error('image_url') <p class="mt-3 text-sm font-semibold text-red-600">{{ $message }}</p> @enderror
                            @endif

                            <button class="mt-5 w-full rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">
                                Simpan gambar ini
                            </button>
                        </div>
                    </form>
                @endforeach
            </div>
        </section>
    @endforeach
</x-admin.layout>
