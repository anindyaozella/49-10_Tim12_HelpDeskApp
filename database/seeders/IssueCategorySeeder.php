<?php

namespace Database\Seeders;

use App\Models\IssueCategory;
use Illuminate\Database\Seeder;

class IssueCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Komputer Tidak Menyala', 'type' => 'Hardware', 'priority' => 'Tinggi',
             'description' => 'PC atau laptop tidak bisa hidup, mati mendadak, atau tidak ada tampilan.'],
            ['name' => 'Printer Tidak Bisa Mencetak', 'type' => 'Hardware', 'priority' => 'Sedang',
             'description' => 'Printer error, paper jam, atau tidak terdeteksi oleh komputer.'],
            ['name' => 'Keyboard/Mouse Rusak', 'type' => 'Hardware', 'priority' => 'Rendah',
             'description' => 'Perangkat input tidak berfungsi atau tombol tidak merespons.'],
            ['name' => 'Aplikasi Error/Crash', 'type' => 'Software', 'priority' => 'Sedang',
             'description' => 'Aplikasi kantor atau sistem internal sering tertutup sendiri atau menampilkan error.'],
            ['name' => 'Instalasi Software Baru', 'type' => 'Software', 'priority' => 'Rendah',
             'description' => 'Permintaan instalasi atau update aplikasi pada perangkat kerja.'],
            ['name' => 'Terserang Virus/Malware', 'type' => 'Software', 'priority' => 'Kritis',
             'description' => 'Perangkat terindikasi virus, ransomware, atau perilaku mencurigakan.'],
            ['name' => 'Internet/WiFi Terputus', 'type' => 'Network', 'priority' => 'Tinggi',
             'description' => 'Koneksi internet atau jaringan kantor mati atau sangat lambat.'],
            ['name' => 'Tidak Bisa Akses Server', 'type' => 'Network', 'priority' => 'Kritis',
             'description' => 'Server internal, VPN, atau shared folder tidak dapat diakses.'],
        ];

        foreach ($data as $item) {
            IssueCategory::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}