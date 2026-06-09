@extends('kepsek.layouts.app')

@section('page-title', 'Laporan Sekolah')
@section('page-sub', 'Rekap Data Akademik')

@section('content')

<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Laporan Akademik Sekolah
        </h1>
        <p class="text-gray-500 mt-1">
            Rekapitulasi data siswa, guru, kelas, mata pelajaran, nilai, dan absensi
        </p>
    </div>

    <div>
        <a href="{{ route('kepsek.laporan.cetak') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 1.252c.111.607-.409 1.157-1.02 1.157h-9.74c-.612 0-1.132-.55-1.02-1.157L6.34 18m11.32 0A3.22 3.22 0 0 0 18 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-8.326 0C6.768 7.441 6 8.376 6 9.456V15.75c0 .792.284 1.52.76 2.088m10.48 0H6.72M9 3.75h6m-6 3h6" />
            </svg>
            <span>Cetak PDF</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
    <div class="bg-white border rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalSiswa ?? 0 }}</h2>
    </div>

    <div class="bg-white border rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Guru</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalGuru ?? 0 }}</h2>
    </div>

    <div class="bg-white border rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Kelas</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalKelas ?? 0 }}</h2>
    </div>

    <div class="bg-white border rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Mata Pelajaran</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalMapel ?? 0 }}</h2>
    </div>
</div>

<div class="bg-white border rounded-2xl p-6 shadow-sm mt-6">
    <h2 class="text-lg font-semibold mb-4">
        Grafik Akademik
    </h2>
    <canvas id="laporanChart" height="100"></canvas>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
    <div class="lg:col-span-2 bg-white border rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-semibold mb-5">
            Ringkasan Akademik
        </h2>

        <div class="space-y-4">
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Total Absensi</span>
                <span class="font-semibold">{{ $totalAbsensi ?? 0 }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Total Nilai Masuk</span>
                <span class="font-semibold">{{ $totalNilai ?? 0 }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Rata-rata Nilai</span>
                <span class="font-semibold text-indigo-600">
                    {{ $rataNilaiPersen ?? 0 }}%
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Tingkat Kehadiran</span>
                <span class="font-semibold text-green-600">
                    {{ $persentaseKehadiran ?? 0 }}%
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white border rounded-2xl p-6 shadow-sm flex flex-col justify-between">
        <div>
            <h2 class="text-lg font-semibold mb-5">
                Informasi Sistem
            </h2>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Periode</span>
                    <span class="font-semibold">2025/2026</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Status</span>
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700 font-medium">
                        Aktif
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Update</span>
                    <span class="font-semibold">{{ now()->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <div class="mt-5 p-4 bg-gray-50 rounded-xl border text-xs text-gray-500">
            Monitoring kepala sekolah terhadap seluruh aktivitas akademik.
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('laporanChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Siswa', 'Guru', 'Kelas', 'Mapel', 'Absensi', 'Nilai'],
        datasets: [{
            label: 'Data Akademik',
            data: [
                {{ $totalSiswa ?? 0 }},
                {{ $totalGuru ?? 0 }},
                {{ $totalKelas ?? 0 }},
                {{ $totalMapel ?? 0 }},
                {{ $totalAbsensi ?? 0 }},
                {{ $totalNilai ?? 0 }}
            ],
            backgroundColor: [
                '#6366F1',
                '#10B981',
                '#F59E0B',
                '#8B5CF6',
                '#EF4444',
                '#3B82F6'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>

@endsection