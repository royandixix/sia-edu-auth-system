<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::insert([

            [
                'nip' => '19800101001',
                'nama_guru' => 'Budi Santoso',
                'jk' => 'L',
                'mapel' => 'Matematika',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101002',
                'nama_guru' => 'Siti Aminah',
                'jk' => 'P',
                'mapel' => 'Bahasa Indonesia',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101003',
                'nama_guru' => 'Andi Saputra',
                'jk' => 'L',
                'mapel' => 'IPA',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101004',
                'nama_guru' => 'Dewi Lestari',
                'jk' => 'P',
                'mapel' => 'IPS',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101005',
                'nama_guru' => 'Ahmad Fauzi',
                'jk' => 'L',
                'mapel' => 'PJOK',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101006',
                'nama_guru' => 'Nurhayati',
                'jk' => 'P',
                'mapel' => 'Bahasa Inggris',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101007',
                'nama_guru' => 'Rudi Hartono',
                'jk' => 'L',
                'mapel' => 'Matematika',
                'alamat' => 'Gowa',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101008',
                'nama_guru' => 'Fitriani',
                'jk' => 'P',
                'mapel' => 'Biologi',
                'alamat' => 'Maros',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101009',
                'nama_guru' => 'Rahmat Hidayat',
                'jk' => 'L',
                'mapel' => 'Fisika',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101010',
                'nama_guru' => 'Dian Puspita',
                'jk' => 'P',
                'mapel' => 'Kimia',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101011',
                'nama_guru' => 'Syamsul Bahri',
                'jk' => 'L',
                'mapel' => 'Sejarah',
                'alamat' => 'Takalar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101012',
                'nama_guru' => 'Kartika Sari',
                'jk' => 'P',
                'mapel' => 'Geografi',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101013',
                'nama_guru' => 'Fajar Nugroho',
                'jk' => 'L',
                'mapel' => 'Ekonomi',
                'alamat' => 'Gowa',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101014',
                'nama_guru' => 'Maya Sari',
                'jk' => 'P',
                'mapel' => 'Sosiologi',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101015',
                'nama_guru' => 'Yusuf Kalla',
                'jk' => 'L',
                'mapel' => 'PPKn',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101016',
                'nama_guru' => 'Sri Wahyuni',
                'jk' => 'P',
                'mapel' => 'Seni Budaya',
                'alamat' => 'Maros',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101017',
                'nama_guru' => 'Arif Setiawan',
                'jk' => 'L',
                'mapel' => 'Informatika',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101018',
                'nama_guru' => 'Nurlina',
                'jk' => 'P',
                'mapel' => 'Prakarya',
                'alamat' => 'Gowa',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101019',
                'nama_guru' => 'Hendra Wijaya',
                'jk' => 'L',
                'mapel' => 'Agama Islam',
                'alamat' => 'Makassar',
                'user_id' => 1,
            ],
            [
                'nip' => '19800101020',
                'nama_guru' => 'Rina Marlina',
                'jk' => 'P',
                'mapel' => 'Bahasa Arab',
                'alamat' => 'Takalar',
                'user_id' => 1,
            ],

        ]);
    }
}