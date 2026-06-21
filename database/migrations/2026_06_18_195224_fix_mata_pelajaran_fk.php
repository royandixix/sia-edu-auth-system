<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // DROP FK LAMA DULU
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
        });

        // BUAT ULANG DENGAN CASCADE DELETE
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->foreign('guru_id')
                ->references('id')
                ->on('guru')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);

            $table->foreign('guru_id')
                ->references('id')
                ->on('guru');
        });
    }
};