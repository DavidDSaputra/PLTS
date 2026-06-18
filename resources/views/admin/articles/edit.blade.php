<x-admin.layout title="Edit Artikel">
    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-black/5">
        @csrf
        @method('PUT')
        @include('admin.articles.form')
    </form>
</x-admin.layout>
