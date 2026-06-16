<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrangTua;

class OrangTuaSeeder extends Seeder
{
    public function run(): void
    {
        OrangTua::insert([
            [
                'nama' => 'Rahman',
                'no_hp' => '081234567890',
                'siswa_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Rahma',
                'no_hp' => '081234567891',
                'siswa_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Abdullah',
                'no_hp' => '081234567892',
                'siswa_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nurhayati',
                'no_hp' => '081234567893',
                'siswa_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Muhammad Yusuf',
                'no_hp' => '081234567894',
                'siswa_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}