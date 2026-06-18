<div class="grid gap-5 lg:grid-cols-2">
    <label class="grid gap-2">
        <span class="text-sm font-semibold">Judul hero</span>
        <input name="title" value="{{ old('title', $slide->title) }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('title') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Urutan</span>
        <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $slide->sort_order) }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('sort_order') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2 lg:col-span-2">
        <span class="text-sm font-semibold">Subjudul</span>
        <textarea name="subtitle" rows="3" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">{{ old('subtitle', $slide->subtitle) }}</textarea>
        @error('subtitle') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Upload gambar</span>
        <input name="image" type="file" accept="image/*" class="rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-[#EEF8FF] file:px-4 file:py-2 file:font-bold file:text-[#0F4FB8]">
        @error('image') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Atau URL gambar</span>
        <input name="image_url" type="url" value="{{ old('image_url', $slide->image_url) }}" placeholder="https://..." class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('image_url') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2 lg:col-span-2">
        <span class="text-sm font-semibold">Alt text gambar</span>
        <input name="alt_text" value="{{ old('alt_text', $slide->alt_text) }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('alt_text') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    @if ($slide->imageUrl())
        <div class="lg:col-span-2">
            <p class="mb-2 text-sm font-semibold">Preview gambar saat ini</p>
            <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->alt_text ?: $slide->title }}" class="h-48 w-full max-w-xl rounded-xl object-cover">
        </div>
    @endif

    <label class="flex items-center gap-3 text-sm font-semibold lg:col-span-2">
        <input name="is_active" type="checkbox" value="1" @checked(old('is_active', $slide->is_active)) class="rounded border-stone-300 text-[#0F4FB8]">
        Tampilkan slide di homepage
    </label>
</div>

<div class="mt-7 flex flex-wrap gap-3">
    <button class="rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">Simpan</button>
    <a href="{{ route('admin.hero-slides.index') }}" class="rounded-xl border border-stone-200 px-5 py-3 text-sm font-bold text-stone-600 transition hover:bg-stone-50">Batal</a>
</div>
