@csrf

<div class="mb-4">
    <label for="name" class="block font-semibold mb-2">Nama Kategori</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $category?->name) }}"
           placeholder="Contoh: Printer Tidak Bisa Mencetak"
           class="w-full p-3 border rounded-lg bg-white">
    @error('name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="type" class="block font-semibold mb-2">Jenis Gangguan</label>
    <select name="type" id="type" class="w-full p-3 border rounded-lg bg-white">
        <option value="">-- Pilih Jenis Gangguan --</option>
        @foreach ($types as $type)
            <option value="{{ $type }}" @selected(old('type', $category?->type) === $type)>
                {{ $type }}
            </option>
        @endforeach
    </select>
    @error('type')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="priority" class="block font-semibold mb-2">Tingkat Prioritas</label>
    <select name="priority" id="priority" class="w-full p-3 border rounded-lg bg-white">
        <option value="">-- Pilih Tingkat Prioritas --</option>
        @foreach ($priorities as $priority)
            <option value="{{ $priority }}" @selected(old('priority', $category?->priority) === $priority)>
                {{ $priority }}
            </option>
        @endforeach
    </select>
    @error('priority')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="description" class="block font-semibold mb-2">Deskripsi</label>
    <textarea name="description" id="description" rows="4"
              placeholder="Jelaskan cakupan kategori ini"
              class="w-full p-3 border rounded-lg bg-white">{{ old('description', $category?->description) }}</textarea>
    @error('description')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-3">
    <a href="{{ route('categories.index') }}"
       class="bg-gray-300 py-2 px-6 rounded-full hover:bg-gray-400">Kembali</a>
    <button type="submit"
            class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">
        {{ $submitLabel ?? 'Simpan' }}
    </button>
</div>