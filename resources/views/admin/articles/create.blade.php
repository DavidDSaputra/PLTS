<x-admin.layout title="Tambah Artikel">
    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
        @csrf
        @include('admin.articles.form')
    </form>
</x-admin.layout>
