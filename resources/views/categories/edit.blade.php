@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Edit Kategori Masalah IT</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @method('PUT')
            @include('categories._form', ['submitLabel' => 'Update'])
        </form>
    </div>
@endsection