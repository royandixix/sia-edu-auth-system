<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {

            if (!Schema::hasColumn('siswa', 'status')) {

                $table->enum('status', [
                    'aktif',
                    'nonaktif'
                ])->default('aktif');

            }
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {

            $table->dropColumn('status');

        });
    }
};