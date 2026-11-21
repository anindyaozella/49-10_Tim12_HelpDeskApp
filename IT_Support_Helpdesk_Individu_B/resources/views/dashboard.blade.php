@extends('layouts.app')
@section('content')
<div class="header"><div><h2>Dashboard</h2><p>Ringkasan Modul Teknisi / Support Staff</p></div><a href="{{ route('teknisi') }}" class="btn">+ Tambah Teknisi</a></div>
<div class="stats">
    <div class="card"><span>Total Teknisi</span><b>{{ $total }}</b></div>
    <div class="card"><span>Teknisi Aktif</span><b>{{ $aktif }}</b></div>
    <div class="card"><span>Jenis Keahlian</span><b>{{ $jumlahKeahlian }}</b></div>
    <div class="card"><span>Support Network</span><b>{{ $network }}</b></div>
</div>
<div class="content"><h3>Teknisi Terbaru</h3><div class="table-wrap"><table>
<tr><th>Kode</th><th>Nama</th><th>Departemen</th><th>Status</th></tr>
@foreach($terbaru as $data)<tr><td>{{ $data->kode }}</td><td>{{ $data->nama }}</td><td>{{ $data->departemen }}</td><td>{{ $data->status }}</td></tr>@endforeach
</table></div></div>
<div class="content"><h3>Modul Teknisi / Support Staff</h3><p>Kelola profil teknisi IT, keahlian khusus, dan kontak internal.</p></div>
@endsection
