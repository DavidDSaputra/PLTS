<!DOCTYPE html>
<html lang="id" class="bg-[#F6F8FA]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Luma Daya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid min-h-screen place-items-center bg-[#F6F8FA] px-4 font-sans text-stone-950">
    <form method="POST" action="{{ route('admin.login.store') }}" class="w-full max-w-md rounded-[1.5rem] bg-white p-8 shadow-xl shadow-stone-200/70 ring-1 ring-black/5">
        @csrf
        <p class="text-sm font-bold uppercase tracking-[0.16em] text-[#0F4FB8]">Luma Daya</p>
        <h1 class="mt-3 text-3xl font-bold">Masuk admin</h1>
        <p class="mt-2 text-sm leading-6 text-stone-500">Kelola artikel, slider, gambar, dan informasi kontak website.</p>

        <label class="mt-7 grid gap-2">
            <span class="text-sm font-semibold">Email</span>
            <input name="email" type="email" value="{{ old('email') }}" autofocus class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
            @error('email') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
        </label>

        <label class="mt-5 grid gap-2">
            <span class="text-sm font-semibold">Password</span>
            <input name="password" type="password" class="rounded-xl border border-stone-300 px-4 py-3 outline-none focus:border-[#0F4FB8]">
            @error('password') <span class="text-sm font-semibold text-red-600">{{ $message }}</span> @enderror
        </label>

        <label class="mt-5 flex items-center gap-2 text-sm font-semibold text-stone-600">
            <input name="remember" type="checkbox" value="1" class="rounded border-stone-300 text-[#0F4FB8]">
            Ingat saya
        </label>

        <button class="mt-7 w-full rounded-xl bg-[#0F4FB8] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#0D3F93]">
            Masuk
        </button>
    </form>
</body>
</html>
