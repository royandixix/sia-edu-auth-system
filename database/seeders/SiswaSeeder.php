<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::insert([

            [
                'nis' => '20260001',
                'nama_siswa' => 'Royandi',
                'foto' => null,
                'jk' => 'L',
                'alamat' => 'Makassar',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260002',
                'nama_siswa' => 'Andi Pratama',
                'foto' => null,
                'jk' => 'L',
                'alamat' => 'Gowa',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260003',
                'nama_siswa' => 'Siti Aisyah',
                'foto' => null,
                'jk' => 'P',
                'alamat' => 'Maros',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260004',
                'nama_siswa' => 'Nurhaliza',
                'foto' => null,
                'jk' => 'P',
                'alamat' => 'Takalar',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260005',
                'nama_siswa' => 'Fajar Ramadhan',
                'foto' => null,
                'jk' => 'L',
                'alamat' => 'Jeneponto',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260006',
                'nama_siswa' => 'Aulia Rahma',
                'foto' => null,
                'jk' => 'P',
                'alamat' => 'Bone',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260007',
                'nama_siswa' => 'Muhammad Rizki',
                'foto' => null,
                'jk' => 'L',
                'alamat' => 'Bulukumba',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260008',
                'nama_siswa' => 'Dewi Sartika',
                'foto' => null,
                'jk' => 'P',
                'alamat' => 'Sinjai',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260009',
                'nama_siswa' => 'Ilham Akbar',
                'foto' => null,
                'jk' => 'L',
                'alamat' => 'Palopo',
                'status' => 'nonaktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

            [
                'nis' => '20260010',
                'nama_siswa' => 'Nabila Putri',
                'foto' => null,
                'jk' => 'P',
                'alamat' => 'Parepare',
                'status' => 'aktif',
                'kelas_id' => 1,
                'user_id' => 1,
            ],

        ]);
    }
}