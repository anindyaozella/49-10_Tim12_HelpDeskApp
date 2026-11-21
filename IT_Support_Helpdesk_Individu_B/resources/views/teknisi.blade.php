@extends('layouts.app')
@section('content')
<div class="header"><div><h2>Data Teknisi</h2><p>Pengelolaan profil dan kontak internal teknisi IT</p></div><a href="#form-tambah" class="btn">+ Tambah Teknisi</a></div>
@if(session('success'))<p class="success">{{ session('success') }}</p>@endif
@if($errors->any())<p class="error-box">Periksa kembali data yang dimasukkan. Keahlian minimal satu harus dipilih.</p>@endif
<div class="content" id="form-tambah"><h3>Tambah Teknisi</h3>
<form action="{{ route('teknisi.store') }}" method="POST" class="form-grid">@csrf
<input name="kode" placeholder="Kode Teknisi" required><input name="nama" placeholder="Nama Lengkap" required>
<input name="departemen" placeholder="Departemen" required><input name="jabatan" placeholder="Jabatan" required>
<input type="email" name="email" placeholder="Email Kantor" required><input name="telepon" placeholder="Nomor Telepon" required>
<input name="ekstensi" placeholder="Ekstensi Telepon"><input name="lokasi" placeholder="Lokasi Kerja">
<select name="status"><option>Aktif</option><option>Tidak Aktif</option></select>
<div class="skill-list"><b>Keahlian Teknisi</b>@foreach($keahlian as $skill)<label class="check"><input type="checkbox" name="keahlian[]" value="{{ $skill->id }}"> {{ $skill->nama }}</label>@endforeach</div>
<button>Simpan Teknisi</button></form></div>
<div class="content"><h3>Daftar Teknisi</h3>
<form method="GET" class="filter" action="{{ route('teknisi') }}">
<input name="cari" value="{{ request('cari') }}" placeholder="Cari nama, kode, departemen...">
<select name="skill"><option value="">Semua Keahlian</option>@foreach($keahlian as $skill)<option value="{{ $skill->id }}" {{ request('skill') == $skill->id ? 'selected' : '' }}>{{ $skill->nama }}</option>@endforeach</select>
<select name="status"><option value="">Semua Status</option><option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option><option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option></select>
<button>Filter</button><a class="btn-reset" href="{{ route('teknisi') }}">Reset</a></form>
<div class="table-wrap"><table><tr><th>Kode</th><th>Nama & Jabatan</th><th>Departemen</th><th>Keahlian</th><th>Kontak Internal</th><th>Status</th><th>Aksi</th></tr>
@forelse($teknisi as $data)<tr>
<td>{{ $data->kode }}</td><td>{{ $data->nama }}<small class="sub">{{ $data->jabatan }}</small></td><td>{{ $data->departemen }}</td>
<td>@foreach($data->keahlian as $skill)<span class="tag">{{ $skill->nama }}</span>@endforeach</td>
<td>{{ $data->email }}<small class="sub">{{ $data->telepon }}</small><small class="sub">Ext. {{ $data->ekstensi ?? '-' }} | {{ $data->lokasi ?? '-' }}</small></td>
<td><span class="status {{ $data->status == 'Aktif' ? '' : 'off' }}">{{ $data->status }}</span></td><td>
<details><summary>Edit</summary><form action="{{ route('teknisi.update',$data->id) }}" method="POST" class="edit-form">@csrf @method('PUT')
<input name="kode" value="{{ $data->kode }}" required><input name="nama" value="{{ $data->nama }}" required>
<input name="departemen" value="{{ $data->departemen }}" required><input name="jabatan" value="{{ $data->jabatan }}" required>
<input type="email" name="email" value="{{ $data->email }}" required><input name="telepon" value="{{ $data->telepon }}" required>
<input name="ekstensi" value="{{ $data->ekstensi }}" placeholder="Ekstensi"><input name="lokasi" value="{{ $data->lokasi }}" placeholder="Lokasi">
<select name="status"><option value="Aktif" {{ $data->status == 'Aktif' ? 'selected' : '' }}>Aktif</option><option value="Tidak Aktif" {{ $data->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option></select>
@foreach($keahlian as $skill)<label class="check"><input type="checkbox" name="keahlian[]" value="{{ $skill->id }}" {{ $data->keahlian->contains($skill->id) ? 'checked' : '' }}> {{ $skill->nama }}</label>@endforeach
<button>Simpan Perubahan</button></form></details>
<form action="{{ route('teknisi.destroy',$data->id) }}" method="POST">@csrf @method('DELETE')<button class="btn-delete" onclick="return confirm('Hapus data teknisi?')">Hapus</button></form>
</td></tr>
@empty<tr><td colspan="7">Data teknisi tidak ditemukan.</td></tr>@endforelse
</table></div></div>
@endsection
