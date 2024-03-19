<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama_report', 100);
            $table->datetime('tanggal_report');
            $table->integer('id_karyawan');
            $table->integer('id_pembimbing');
            $table->integer('id_task');
            $table->text('dokumen')->nullable(); 
            $table->text('keterangan')->nullable(); 
            $table->string('link_video')->nullable(); 
            $table->string('status', 100);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
