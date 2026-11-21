<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teknisi;
use App\Models\Keahlian;

class TeknisiController extends Controller
{
    public function dashboard() {
        $network = Keahlian::where('nama','Network')->first();
        return view('dashboard', [
            'total'=>Teknisi::count(),
            'aktif'=>Teknisi::where('status','Aktif')->count(),
            'jumlahKeahlian'=>Keahlian::count(),
            'network'=>$network ? $network->teknisi()->count() : 0,
            'terbaru'=>Teknisi::latest()->take(5)->get()
        ]);
    }

    public function index(Request $request) {
        $teknisi = Teknisi::with('keahlian')
            ->when($request->cari, function ($q,$cari) {
                $q->where(function ($s) use ($cari) {
                    $s->where('nama','like',"%$cari%")
                      ->orWhere('kode','like',"%$cari%")
                      ->orWhere('departemen','like',"%$cari%");
                });
            })
            ->when($request->status, fn($q) => $q->where('status',$request->status))
            ->when($request->skill, fn($q,$skill) => $q->whereHas('keahlian', fn($s) => $s->where('keahlian.id',$skill)))
            ->orderBy('kode')->get();

        return view('teknisi', ['teknisi'=>$teknisi,'keahlian'=>Keahlian::orderBy('nama')->get()]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'kode'=>'required|unique:teknisi,kode','nama'=>'required','departemen'=>'required',
            'jabatan'=>'required','email'=>'required|email|unique:teknisi,email',
            'telepon'=>'required','ekstensi'=>'nullable','lokasi'=>'nullable',
            'status'=>'required|in:Aktif,Tidak Aktif','keahlian'=>'required|array|min:1',
            'keahlian.*'=>'exists:keahlian,id'
        ]);
        $teknisi = Teknisi::create(collect($data)->except('keahlian')->all());
        $teknisi->keahlian()->sync($data['keahlian']);
        return back()->with('success','Data teknisi berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $teknisi = Teknisi::findOrFail($id);
        $data = $request->validate([
            'kode'=>'required|unique:teknisi,kode,'.$id,'nama'=>'required','departemen'=>'required',
            'jabatan'=>'required','email'=>'required|email|unique:teknisi,email,'.$id,
            'telepon'=>'required','ekstensi'=>'nullable','lokasi'=>'nullable',
            'status'=>'required|in:Aktif,Tidak Aktif','keahlian'=>'required|array|min:1',
            'keahlian.*'=>'exists:keahlian,id'
        ]);
        $teknisi->update(collect($data)->except('keahlian')->all());
        $teknisi->keahlian()->sync($data['keahlian']);
        return back()->with('success','Data teknisi berhasil diperbarui.');
    }

    public function destroy($id) {
        Teknisi::findOrFail($id)->delete();
        return back()->with('success','Data teknisi berhasil dihapus.');
    }

    public function skills() {
        return view('keahlian',['keahlian'=>Keahlian::withCount('teknisi')->orderBy('nama')->get()]);
    }

    public function skillStore(Request $request) {
        $data = $request->validate(['nama'=>'required|unique:keahlian,nama','deskripsi'=>'required']);
        Keahlian::create($data);
        return back()->with('success','Keahlian berhasil ditambahkan.');
    }

    public function skillDelete($id) {
        Keahlian::findOrFail($id)->delete();
        return back()->with('success','Keahlian berhasil dihapus.');
    }
}
