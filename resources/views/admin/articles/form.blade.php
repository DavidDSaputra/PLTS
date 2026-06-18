<div class="grid gap-5 lg:grid-cols-2">
    <label class="grid gap-2">
        <span class="text-sm font-semibold">Judul</span>
        <input name="title" value="{{ old('title', $article->title) }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('title') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Slug</span>
        <input name="slug" value="{{ old('slug', $article->slug) }}" placeholder="otomatis dari judul jika kosong" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('slug') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Kategori</span>
        <input name="category" value="{{ old('category', $article->category) }}" placeholder="Panduan PLTS" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('category') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2">
        <span class="text-sm font-semibold">Tanggal publish</span>
        <input name="published_at" type="datetime-local" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
        @error('published_at') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2 lg:col-span-2">
        <span class="text-sm font-semibold">Gambar artikel</span>
        <input name="image" type="file" accept="image/*" class="rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-[#EEF8FF] file:px-4 file:py-2 file:font-bold file:text-[#0F4FB8]">
        @if ($article->imageUrl())
            <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" class="mt-2 h-32 w-56 rounded-xl object-cover">
        @endif
        @error('image') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2 lg:col-span-2">
        <span class="text-sm font-semibold">Ringkasan</span>
        <textarea name="excerpt" rows="3" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">{{ old('excerpt', $article->excerpt) }}</textarea>
        @error('excerpt') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="grid gap-2 lg:col-span-2">
        <span class="text-sm font-semibold">Isi artikel</span>
        <textarea name="body" rows="10" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">{{ old('body', $article->body) }}</textarea>
        @error('body') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
    </label>

    <label class="flex items-center gap-3 text-sm font-semibold lg:col-span-2">
        <input name="is_published" type="checkbox" value="1" @checked(old('is_published', $article->is_published)) class="rounded border-stone-300 text-[#0F4FB8]">
        Tampilkan artikel di website
    </label>
</div>

<div class="mt-7 flex flex-wrap gap-3">
    <button class="rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">Simpan</button>
    <a href="{{ route('admin.articles.index') }}" class="rounded-xl border border-stone-200 px-5 py-3 text-sm font-bold text-stone-600 transition hover:bg-stone-50">Batal</a>
</div>
