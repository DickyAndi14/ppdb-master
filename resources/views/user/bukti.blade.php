@extends('layouts.app')

@section('title', 'Bukti Pendaftaran')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-[#F3F0FF] to-[#F5F3FF] py-12">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-10 text-center">
      <h2 class="text-3xl font-bold text-green-600 mb-6">✅ Pendaftaran Berhasil!</h2>
      <p class="text-gray-600 mb-8">Terima kasih telah mendaftar di <strong>TK Ceria Belajar</strong>.</p>

      <div class="border border-yellow-300 bg-yellow-50 rounded-xl p-6 text-left mb-6">
        <h3 class="font-semibold text-yellow-700 mb-4 flex items-center gap-2">📋 Bukti Pendaftaran</h3>
        <p><strong>ID Pendaftar:</strong> {{ $pendaftar->id }}</p>
        <p><strong>Nama Siswa:</strong> {{ $pendaftar->nama_siswa }}</p>
        <p><strong>Nama Ayah:</strong> {{ $pendaftar->nama_ayah }}</p>
        <p><strong>Jalur:</strong> {{ $pendaftar->jalur }}</p>
        <p><strong>Kelas:</strong> {{ $pendaftar->kelas }}</p>
      </div>

      <a href="{{ route('user.dashboard') }}"
         class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        ⬅ Kembali ke Dashboard
      </a>
    </div>
  </div>
</section>
@endsection