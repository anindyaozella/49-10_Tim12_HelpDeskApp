@extends('layouts.app')

@section('title', 'Form Pengaduan Gangguan IT')

@section('content')
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-blue-900">Selamat Datang di Website Pengaduan Gangguan IT/Helpdesk</h1>
        <h2 class="text-3xl font-bold text-blue-600 mt-4">Form Pengaduan Gangguan IT</h2>
        <p class="mt-4 text-lg">Silahkan beri tahu kami jenis gangguan yang sedang anda alami dengan mengisi formulir berikut.</p>
    </div>

    <form class="max-w-5xl mx-auto" onsubmit="return false">
        <label class="block font-bold mb-2">Nama Lengkap:</label>
        <input type="text" placeholder="Masukkan nama lengkap" class="w-full p-3 border rounded-lg bg-white mb-5">

        <label class="block font-bold mb-2">Nomor Telepon:</label>
        <input type="text" placeholder="Masukkan nomor telepon" class="w-full p-3 border rounded-lg bg-white mb-5">

        <label class="block font-bold mb-2">Pilih Jenis Gangguan:</label>
        <select class="w-full p-3 border rounded-lg bg-white mb-5">
            <option value="">-- Pilih Jenis Gangguan --</option>
            @foreach ($categories as $type => $items)
                <optgroup label="{{ $type }}">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        <label class="block font-bold mb-2">Pilih Tingkat Prioritas:</label>
        <select class="w-full p-3 border rounded-lg bg-white mb-5">
            <option value="">-- Pilih Tingkat Prioritas --</option>
            @foreach ($priorities as $priority)
                <option value="{{ $priority }}">{{ $priority }}</option>
            @endforeach
        </select>

        <label class="block font-bold mb-2">Deskripsikan Gangguan Anda:</label>
        <textarea rows="5" placeholder="Jelaskan gangguan yang sedang Anda alami"
                  class="w-full p-3 border rounded-lg bg-white mb-5"></textarea>

        <button type="button" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
            Kirim Pengaduan
        </button>
    </form>
@endsection