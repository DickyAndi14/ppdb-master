<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('pendaftar')) {
            Schema::create('pendaftar', function (Blueprint $table) {
                $table->id()->primary();
                $table->string('nama_siswa');
                $table->string('tempat_lahir');
                $table->string('jenis_kelamin');
                $table->integer('anak_ke');
                $table->string('alamat');
                $table->string('nik');
                $table->date('tanggal_lahir');
                $table->string('agama');
                $table->integer('jumlah_saudara')->nullable();
                $table->string('nama_ayah');
                $table->string('nik_ayah');
                $table->string('pekerjaan_ayah');
                $table->string('penghasilan_ayah');
                $table->string('nama_ibu');
                $table->string('nik_ibu');
                $table->string('pekerjaan_ibu');
                $table->string('penghasilan_ibu');
                $table->string('telepon');
                $table->string('email');
                $table->text('alamat_orangtua');
                $table->string('jalur');
                $table->string('kelas');
                $table->string('status')->default('Menunggu Review'); // 👈 tambahkan jika belum ada
                $table->timestamps();
            });
        }
    }    
};