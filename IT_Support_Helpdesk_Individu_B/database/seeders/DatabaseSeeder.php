<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teknisi;
use App\Models\Keahlian;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void {
        User::updateOrCreate(['email'=>'admin@helpdesk.test'], [
            'name'=>'Admin','password'=>Hash::make('password')
        ]);

        $network = Keahlian::firstOrCreate(['nama'=>'Network'],['deskripsi'=>'Jaringan LAN, Wi-Fi, router, dan koneksi.']);
        $database = Keahlian::firstOrCreate(['nama'=>'Database'],['deskripsi'=>'Database, query, backup, dan pemulihan data.']);
        $hardware = Keahlian::firstOrCreate(['nama'=>'Hardware'],['deskripsi'=>'Komputer, laptop, printer, dan perangkat.']);

        $andi = Teknisi::updateOrCreate(['kode'=>'IT-001'],[
            'nama'=>'Andi Pratama','departemen'=>'IT Infrastructure','jabatan'=>'Network Support',
            'email'=>'andi@company.test','telepon'=>'081234567801','ekstensi'=>'101','lokasi'=>'Lantai 1','status'=>'Aktif'
        ]);
        $andi->keahlian()->sync([$network->id,$hardware->id]);

        $sinta = Teknisi::updateOrCreate(['kode'=>'IT-002'],[
            'nama'=>'Sinta Maharani','departemen'=>'IT Support','jabatan'=>'IT Support Staff',
            'email'=>'sinta@company.test','telepon'=>'081234567802','ekstensi'=>'102','lokasi'=>'Lantai 2','status'=>'Aktif'
        ]);
        $sinta->keahlian()->sync([$hardware->id]);

        $raka = Teknisi::updateOrCreate(['kode'=>'IT-003'],[
            'nama'=>'Raka Wijaya','departemen'=>'IT Application','jabatan'=>'Database Support',
            'email'=>'raka@company.test','telepon'=>'081234567803','ekstensi'=>'103','lokasi'=>'Lantai 2','status'=>'Aktif'
        ]);
        $raka->keahlian()->sync([$database->id]);
    }
}
