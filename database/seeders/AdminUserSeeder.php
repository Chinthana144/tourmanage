<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone1' => '0769641844',
            'phone2' => '0525094487',
            'email' => 'chinthana144@gmail.com',
            'password' => '$2y$12$zoSCnmKYGIJEFz6Ixa1xW.3oHBGOx2aYKe8awQamJyehsyZQQve56',
            'profile_picture' => 'images/profiles/profile.jpg',
            'status' => 'images/profiles/profile.jpg',
            'role_id' => '1',
        ]);

        User::create([
            'first_name' => 'Asela',
            'last_name' => 'Edirisinghe',
            'phone1' => '+817066471777',
            'phone2' => '+817066471777',
            'email' => 'asela@akagiexp.com',
            'password' => '$2y$12$K7YDOGFS/4/qDre29euPjumJXl/Ps7bMEEHGEDnECXA9tKA/ITT62',
            'profile_picture' => 'images/profiles/profile.jpg',
            'status' => 'images/profiles/profile.jpg',
            'role_id' => '1',
        ]);
    }
}
