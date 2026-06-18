<x-admin.layout title="Edit Hero Slide">
    <form method="POST" action="{{ route('admin.hero-slides.update', $slide) }}" enctype="multipart/form-data" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
        @csrf
        @method('PUT')
        @include('admin.hero-slides.form')
    </form>
</x-admin.layout>
