@php
    $navbarLogo = \App\Support\SiteSettings::mediaUrl($settings['navbar_logo'] ?? null, asset('assets/images/logo1.png'));
    $footerLogo = \App\Support\SiteSettings::mediaUrl($settings['footer_logo'] ?? null, asset('assets/images/logo1.png'));
@endphp

<x-admin.layout title="Kontak & Setting">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="grid gap-6">
        @csrf
        @method('PUT')

        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
            <h2 class="text-xl font-bold">Informasi kontak</h2>
            <div class="mt-5 grid gap-5 lg:grid-cols-2">
                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Telepon</span>
                    <input name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '(888) 456 7890') }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('contact_phone') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Email</span>
                    <input name="contact_email" type="email" value="{{ old('contact_email', $settings['contact_email'] ?? 'halo@lumadaya.id') }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('contact_email') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2 lg:col-span-2">
                    <span class="text-sm font-semibold">Alamat</span>
                    <input name="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? 'Jakarta, Indonesia') }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('contact_address') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2 lg:col-span-2">
                    <span class="text-sm font-semibold">Tagline footer</span>
                    <input name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Smart energy solutions untuk Indonesia.') }}" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('site_tagline') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>
            </div>
        </section>

        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
            <h2 class="text-xl font-bold">Social media</h2>
            <div class="mt-5 grid gap-5 lg:grid-cols-3">
                <label class="grid gap-2">
                    <span class="text-sm font-semibold">LinkedIn URL</span>
                    <input name="linkedin_url" type="url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" placeholder="https://linkedin.com/company/..." class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('linkedin_url') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Instagram URL</span>
                    <input name="instagram_url" type="url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/..." class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('instagram_url') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Facebook URL</span>
                    <input name="facebook_url" type="url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/..." class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
                    @error('facebook_url') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>
            </div>
        </section>

        <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
            <h2 class="text-xl font-bold">Logo website</h2>
            <div class="mt-5 grid gap-6 lg:grid-cols-2">
                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Logo navbar</span>
                    <input name="navbar_logo" type="file" accept="image/*" class="rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-[#EEF8FF] file:px-4 file:py-2 file:font-bold file:text-[#0F4FB8]">
                    <img src="{{ $navbarLogo }}" alt="Logo navbar saat ini" class="mt-2 h-20 w-72 rounded-xl object-contain">
                    @error('navbar_logo') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>

                <label class="grid gap-2">
                    <span class="text-sm font-semibold">Logo footer</span>
                    <input name="footer_logo" type="file" accept="image/*" class="rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-[#EEF8FF] file:px-4 file:py-2 file:font-bold file:text-[#0F4FB8]">
                    <img src="{{ $footerLogo }}" alt="Logo footer saat ini" class="mt-2 h-20 w-72 rounded-xl object-contain">
                    @error('footer_logo') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
                </label>
            </div>
        </section>

        <div class="flex flex-wrap gap-3">
            <button class="rounded-xl bg-[#0F4FB8] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0D3F93]">Simpan setting</button>
            <a href="/" class="rounded-xl border border-stone-200 px-5 py-3 text-sm font-bold text-stone-600 transition hover:bg-stone-50">Lihat situs</a>
        </div>
    </form>
</x-admin.layout>
