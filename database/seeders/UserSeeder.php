<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Password otomatis di-hash karena model User memakai cast 'hashed'
        User::updateOrCreate(
            ['email' => 'admin@helpdesk.test'],
            [
                'name'     => 'Admin Helpdesk',
                'password' => 'password123', 
                'role'     => 'admin', 
            ]
        );
         User::updateOrCreate(
            ['email' => 'viewer@helpdesk.test'],
            [
                'name'     => 'Viewer Helpdesk',
                'password' => 'viewer123',
                'role'     => 'viewer',
            ]
        );
    }
}