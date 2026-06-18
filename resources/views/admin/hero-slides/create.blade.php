<x-admin.layout title="Tambah Hero Slide">
    <form method="POST" action="{{ route('admin.hero-slides.store') }}" enctype="multipart/form-data" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
        @csrf
        @include('admin.hero-slides.form')
    </form>
</x-admin.layout>
