@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-3xl font-bold text-blue-800 mb-4">{{ $category->name }}</h1>

        <div class="flex gap-3 mb-6">
            <span class="px-3 py-1 rounded-full text-sm {{ $category->type_badge }}">{{ $category->type }}</span>
            <span class="px-3 py-1 rounded-full text-sm {{ $category->priority_badge }}">
                Prioritas: {{ $category->priority }}
            </span>
        </div>

        <h2 class="font-semibold mb-1">Deskripsi</h2>
        <p class="leading-relaxed whitespace-pre-line text-gray-700">{{ $category->description ?: '-' }}</p>

        <p class="text-sm text-gray-500 mt-6">
            Dibuat: {{ $category->created_at->format('d M Y, H:i') }} WIB |
            Diperbarui: {{ $category->updated_at->format('d M Y, H:i') }} WIB
        </p>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('categories.index') }}" class="bg-gray-300 py-2 px-6 rounded-full hover:bg-gray-400">Kembali</a>
            <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-500 text-white py-2 px-6 rounded-full hover:bg-yellow-600">Edit</a>
        </div>
    </div>
@endsection