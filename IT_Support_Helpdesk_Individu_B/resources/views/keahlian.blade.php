@extends('layouts.app')
@section('content')
<div class="header"><div><h2>Master Keahlian</h2><p>Pengelolaan jenis keahlian khusus teknisi</p></div></div>
@if(session('success'))<p class="success">{{ session('success') }}</p>@endif
<div class="content"><h3>Tambah Keahlian</h3><form action="{{ route('keahlian.store') }}" method="POST" class="form-grid">@csrf
<input name="nama" placeholder="Nama Keahlian" required><input name="deskripsi" placeholder="Deskripsi keahlian" required><button>Tambah Keahlian</button></form></div>
<div class="content"><h3>Daftar Keahlian</h3><div class="table-wrap"><table>
<tr><th>Nama Keahlian</th><th>Deskripsi</th><th>Jumlah Teknisi</th><th>Aksi</th></tr>
@foreach($keahlian as $skill)<tr><td><b>{{ $skill->nama }}</b></td><td>{{ $skill->deskripsi }}</td><td>{{ $skill->teknisi_count }} Teknisi</td><td>
<form action="{{ route('keahlian.destroy',$skill->id) }}" method="POST">@csrf @method('DELETE')<button class="btn-delete" onclick="return confirm('Hapus keahlian?')">Hapus</button></form>
</td></tr>@endforeach
</table></div></div>
@endsection
