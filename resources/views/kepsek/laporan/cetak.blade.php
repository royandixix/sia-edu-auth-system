<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan_Akademik_{{ now()->format('d_M_Y') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            background-color: #f3f4f6;
        }

        .page-a4 {
            width: 210mm;
            min-height: 297mm;
            margin: 20px auto;
            background: #ffffff;
            padding: 25.4mm; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body {
                background-color: #ffffff !important;
                color: #000000 !important;
                padding: 0 !important;
            }
            .page-a4 {
                width: 210mm;
                height: 297mm;
                margin: 0 !important;
                padding: 25.4mm !important;
                box-shadow: none !important;
                page-break-after: avoid;
                page-break-inside: avoid;
            }
            .print-card {
                border: 1px solid #000000 !important;
                background: #ffffff !important;
            }
            .print-badge {
                border: 1px solid #000000 !important;
                color: #000000 !important;
                background: transparent !important;
            }
        }
    </style>
</head>
<body class="antialiased text-[#000000]">

    <div class="page-a4 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-start border-b-2 border-[#000000] pb-6 mb-8">
                <div>
                    <span class="print-badge inline-block text-[10px] font-bold tracking-widest uppercase bg-[#000000] text-white px-2.5 py-1 rounded mb-3">
                        Dokumen Resmi
                    </span>
                    <h1 class="text-2xl font-bold tracking-tight text-[#000000]">
                        LAPORAN AKADEMIK SEKOLAH
                    </h1>
                    <p class="text-xs text-gray-500 mt-1 font-light">
                        Rekapitulasi data siswa, guru, kelas, mata pelajaran, nilai, dan absensi terpusat.
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Tanggal Cetak</p>
                    <p class="text-sm font-bold mt-0.5">{{ now()->format('d M Y') }}</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">{{ now()->format('H:i') }} WITA</p>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="print-card border border-gray-200 rounded-xl p-4 bg-white">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Total Siswa</p>
                    <h3 class="text-2xl font-bold tracking-tight mt-0.5">{{ $totalSiswa ?? 0 }}</h3>
                </div>
                <div class="print-card border border-gray-200 rounded-xl p-4 bg-white">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Total Guru</p>
                    <h3 class="text-2xl font-bold tracking-tight mt-0.5">{{ $totalGuru ?? 0 }}</h3>
                </div>
                <div class="print-card border border-gray-200 rounded-xl p-4 bg-white">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Total Kelas</p>
                    <h3 class="text-2xl font-bold tracking-tight mt-0.5">{{ $totalKelas ?? 0 }}</h3>
                </div>
                <div class="print-card border border-gray-200 rounded-xl p-4 bg-white">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Mata Pelajaran</p>
                    <h3 class="text-2xl font-bold tracking-tight mt-0.5">{{ $totalMapel ?? 0 }}</h3>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#000000] mb-3">
                    Ringkasan Kinerja Akademik
                </h2>
                <div class="border border-gray-200 rounded-xl overflow-hidden bg-white print-card">
                    <table class="w-full text-xs">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50 text-[#000000]">
                                <th class="p-3.5 font-semibold text-left">Indikator Parameter</th>
                                <th class="p-3.5 font-semibold text-right w-44">Hasil Evaluasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="p-3.5 text-gray-600 font-light">Log Total Absensi Terpantau</td>
                                <td class="p-3.5 text-right font-semibold">{{ $totalAbsensi ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td class="p-3.5 text-gray-600 font-light">Kuantitas Nilai Masuk</td>
                                <td class="p-3.5 text-right font-semibold">{{ $totalNilai ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td class="p-3.5 text-gray-600 font-light">Rata-rata Nilai Capaian</td>
                                <td class="p-3.5 text-right font-bold text-[#000000]">{{ $rataNilaiPersen ?? 0 }}%</td>
                            </tr>
                            <tr>
                                <td class="p-3.5 text-gray-600 font-light">Persentase Kehadiran Kolektif</td>
                                <td class="p-3.5 text-right font-bold text-[#000000]">{{ $persentaseKehadiran ?? 0 }}%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 items-end border-t border-gray-200 pt-6 text-[11px]">
            <div class="space-y-1 text-gray-400 font-light">
                <p class="font-bold text-[#000000] uppercase tracking-wider text-[9px] mb-1">Metadata Dokumen</p>
                <p>Periode Akademik: <span class="font-medium text-[#000000]">2025/2026</span></p>
                <p>Sistem Otorisasi: <span class="font-medium text-[#000000]">SIAKAD Pusat</span></p>
                <p>Dokumen digital ini divalidasi sah oleh kepala sekolah tanpa tanda tangan basah.</p>
            </div>
            <div class="flex flex-col items-end">
                <div class="w-48 text-center">
                    <p class="text-gray-400 uppercase tracking-widest text-[8px] mb-14">Mengesahkan,</p>
                    <div class="border-t border-[#000000] pt-1.5">
                        <p class="font-bold uppercase tracking-wide text-[#000000] text-[11px]">Kepala Sekolah</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">NIP. ————————</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                window.print();
            }, 400);
        });

        window.onafterprint = function() {
            window.close();
        };
    </script>
</body>
</html>