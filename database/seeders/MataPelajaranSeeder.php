<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        MataPelajaran::insert([

            [
                'nama_mapel' => 'Matematika',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Bahasa Indonesia',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'IPA',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'IPS',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'PPKn',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Agama Islam',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'PJOK',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Seni Budaya',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Prakarya',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Informatika',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Fisika',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Kimia',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Biologi',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Ekonomi',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Sosiologi',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Geografi',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Sejarah',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Bahasa Arab',
                'guru_id' => 4,
            ],
            [
                'nama_mapel' => 'Muatan Lokal',
                'guru_id' => 4,
            ],

        ]);
    }
}