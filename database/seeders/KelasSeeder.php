<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [

            // ===== X (10) =====
            'X RPL 1',
            'X RPL 2',
            'X TKJ 1',
            'X TKJ 2',
            'X AKL 1',
            'X AKL 2',
            'X OTKP 1',
            'X OTKP 2',

            // ===== XI (11) =====
            'XI RPL 1',
            'XI RPL 2',
            'XI TKJ 1',
            'XI TKJ 2',
            'XI AKL 1',
            'XI AKL 2',
            'XI OTKP 1',
            'XI OTKP 2',

            // ===== XII (12) =====
            'XII RPL 1',
            'XII RPL 2',
            'XII TKJ 1',
            'XII TKJ 2',
            'XII AKL 1',
            'XII AKL 2',
            'XII OTKP 1',
            'XII OTKP 2',
        ];

        foreach ($kelas as $k) {
            Kelas::create([
                'nama_kelas' => $k
            ]);
        }
    }
}