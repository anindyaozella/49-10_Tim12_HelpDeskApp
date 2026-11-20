@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Tambah Kategori Masalah IT</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @include('categories._form', ['category' => null, 'submitLabel' => 'Simpan'])
        </form>
    </div>
@endsection