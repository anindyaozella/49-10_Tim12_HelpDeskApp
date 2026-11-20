@extends('layouts.app')

@section('title', 'Kategori Masalah IT')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-800">Kategori Masalah IT</h1>
        @if(auth()->user()->isAdmin())
        <a href="{{ route('categories.create') }}"
           class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">
            + Tambah Kategori
        </a>
        @endif
    </div>

    {{-- Search dan filter --}}
    <form action="{{ route('categories.index') }}" method="GET" class="flex flex-wrap gap-3 mb-6">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari nama kategori..."
               class="flex-1 min-w-[200px] p-3 border rounded-lg bg-white">
        <select name="type" class="p-3 border rounded-lg bg-white">
            <option value="">Semua Jenis</option>
            @foreach ($types as $type)
                <option value="{{ $type }}" @selected(request('type') === $type)>{{ $type }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Cari</button>
        <a href="{{ route('categories.index') }}" class="bg-gray-300 py-2 px-6 rounded-lg hover:bg-gray-400">Reset</a>
    </form>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nama Kategori</th>
                    <th class="p-4">Jenis</th>
                    <th class="p-4">Prioritas</th>
                    <th class="p-4">Deskripsi</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b hover:bg-blue-50">
                        <td class="p-4">{{ $categories->firstItem() + $loop->index }}</td>
                        <td class="p-4 font-semibold">{{ $category->name }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm {{ $category->type_badge }}">
                                {{ $category->type }}
                            </span>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm {{ $category->priority_badge }}">
                                {{ $category->priority }}
                            </span>
                        </td>
                        <td class="p-4 text-gray-600">{{ Str::limit($category->description, 60) }}</td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-4 text-sm">
                                <a href="{{ route('categories.show', $category) }}" class="text-blue-600 hover:underline">Detail</a>
                                @if(auth()->user()->isAdmin())
                                <a href="{{ route('categories.edit', $category) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">Belum ada kategori masalah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>
@endsection